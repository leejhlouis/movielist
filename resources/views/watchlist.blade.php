@extends('layouts.app')

@section('style')
    <style>
        .table>:not(caption)>*>*:not(th[scope="col"]),
        .bg-gray{
            background: #3f3f3f;
        }

        .border-gray{
            border: 1px solid #6f6f6f;
        }

        .w-fit{
            width: fit-content;
        }

        .page-link{
          background: #3f3f3f;
          border-color: #3f3f3f;
          color: var(--bs-white);
        }

        .page-link:hover{
          background: #5f5f5f;
          border-color: #5f5f5f;
          color: var(--bs-white);
        }

        .page-item.active .page-link{
          background: var(--bs-danger);
          border-color: var(--bs-danger);
        }

        @media only screen and (max-width: 580px) {
          .table-container{
            overflow-x: scroll;
          }
        }

        .text-status{
          font-weight: 600;
          color: rgb(169, 238, 186);
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <h1 class="d-flex align-items-center mb-4">
            <i class="bi bi-bookmark-fill text-danger me-3"></i>
            <p class="mb-0 h3">My <span class="text-danger">Watchlist</span></p>
        </h1>

        <form class="my-5 d-flex bg-gray rounded-5 align-items-center" role="search" method="GET" action="{{ url('/watchlist') }}">
            <input class="form-control me-2 bg-gray border-0" name="search" type="search" placeholder="Search movie..." aria-label="Search">
            <button class="btn btn-danger d-flex" type="submit">
              <i class="bi bi-search me-2"></i>
              <p class="mb-0">Search</p>
            </button>
        </form>

        <form id="statusFilterForm" class="input-group mb-5" method="GET" action="{{ url('/watchlist') }}">
          <label class="input-group-text border-0 bg-dark text-white" for="status">
              <i class="bi bi-funnel-fill"></i>
          </label>
          <select class="px-2 bg-dark text-white rounded" id="statusFilter" name="status">
            <option value="all"  @if(Request::get('status') == "all") selected @endif>All</option>
            <option value="Planned" @if(Request::get('status') == "Planned") selected @endif>Planned</option>
            <option value="Watching" @if(Request::get('status') == "Watching") selected @endif>Watching</option>
            <option value="Finished" @if(Request::get('status') == "Finished") selected @endif>Finished</option>
          </select>
        </form>

        <div class="container table-container">
          <table class="table table-dark border-gray align-middle overflow-scroll" style="min-width: 480px;">
              <thead class="">
                  <tr>
                    <th class="border-0" scope="col">Poster</th>
                    <th class="border-0" scope="col">Title</th>
                    <th class="border-0" scope="col">Status</th>
                    <th class="border-0" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($watchlist as $w)
                    <tr>
                      <th scope="row" class="pe-lg-5" style="width: 15%;">
                          <img class="w-100" src="{{ url('/storage/movies/thumbnail/'.$w->movie->thumbnail ) }}" alt="">
                      </th>
                      <td class="h6">{{ $w->movie->title }}</td>
                      <td class="text-status">{{ $w->status }}</td>
                      <td style="width: 15%;">
                          <a name="" id="" class="btn btn-sm btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#statusModal{{ $w->id }}">Change Status</a>
                      </td>
                    </tr>
                    
                    <div class="modal fade" id="statusModal{{ $w->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                          <form method="POST" action="{{ url('watchlist/'.$w->id) }}">
                            {{ method_field('PUT') }}
                            @csrf
                            <fieldset>
                              <div class="modal-header border-0">
                                <label for="status" class="h1 modal-title fs-5" id="modalLabel">Change status</label>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <select id="status" name="status" class="w-100 p-2 bg-dark text-white rounded">
                                  <option value="Planned" @if($w->status == "Planned") selected @endif>Planned</option>
                                  <option value="Watching" @if($w->status == "Watching") selected @endif>Watching</option>
                                  <option value="Finished" @if($w->status == "Finished") selected @endif>Finished</option>
                                  <option value="Remove">Remove</option>
                                </select>
                              </div>
                              <div class="modal-footer border-0">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Save changes</button>
                              </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  
                </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <p>Showing <span class="fw-bold">{{ $watchlist->firstItem() }}</span> to <span class="fw-bold">{{ $watchlist->lastItem() }}</span> of <span class="fw-bold">{{ $watchlist->total() }}</span> results</p>
            <nav>
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="{{ $watchlist->previousPageUrl() }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  @for ($i = 1; $i <= $watchlist->lastPage(); $i++)
                    <li class="page-item @if($watchlist->currentPage() == $i) active @endif"><a class="page-link" href="{{ $watchlist->url($i) }}">{{ $i }}</a></li>
                  @endfor
                  <li class="page-item">
                    <a class="page-link" href="{{ $watchlist->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>

    </div>

@endsection

@section('script')
<script>
    document.getElementById('statusFilter').onchange = ()=>{
      document.getElementById('statusFilterForm').submit();
    }
</script>
@endsection