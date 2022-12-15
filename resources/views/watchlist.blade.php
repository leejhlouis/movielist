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
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <h1 class="d-flex align-items-center mb-4">
            <i class="bi bi-bookmark-fill text-danger me-3"></i>
            <p class="mb-0 h3">My <span class="text-danger">Watchlist</span></p>
        </h1>

        <form class="my-5 d-flex bg-gray rounded-5 align-items-center" role="search">
            <input class="form-control me-2 bg-gray border-0" type="search" placeholder="Search" aria-label="Search">
            <i class="bi bi-search mx-3"></i>
        </form>

        <div class="input-group mb-3" style="width: 15%;">
            <label class="input-group-text border-0 bg-dark text-white" for="inputGroupSelect01">
                <i class="bi bi-funnel-fill"></i>
            </label>
            <select class="px-2 bg-dark text-white rounded" id="inputGroupSelect01">
              <option selected>All</option>
              <option value="Planned">Planned</option>
              <option value="Watching">Watching</option>
              <option value="Finished">Finished</option>
            </select>
          </div>

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
                <tr>
                    <th scope="row" class="pe-lg-5" style="width: 15%;">
                        <img class="w-100" src="https://m.media-amazon.com/images/M/MV5BZWMyYzFjYTYtNTRjYi00OGExLWE2YzgtOGRmYjAxZTU3NzBiXkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_FMjpg_UX1000_.jpg" alt="">
                    </th>
                    <td>Spider-Man: No Way Home</td>
                    <td class="text-success fw-bold">Planning</td>
                    <td style="width: 15%;">
                        <a name="" id="" class="btn btn-sm btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#statusModal">Change Status</a>
                    </td>
                </tr>
              </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <p>Showing <span class="fw-bold">1</span> to <span class="fw-bold">1</span> of <span class="fw-bold">1</span> results</p>
            <nav aria-label="Page navigation example">
                <ul class="pagination bg-dark">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>

    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <div class="modal-header border-0">
            <h1 class="modal-title fs-5" id="modalLabel">Change status</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <select class="w-100 p-2 bg-dark text-white rounded" id="inputGroupSelect01">
              <option selected>All</option>
              <option value="Planned">Planned</option>
              <option value="Watching">Watching</option>
              <option value="Finished">Finished</option>
            </select>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Save changes</button>
          </div>
        </div>
      </div>
    </div>

@endsection