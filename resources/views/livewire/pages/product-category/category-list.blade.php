<div>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Category Product List</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">Master</li>
                            <li class="breadcrumb-item active">Category Product List</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                {{-- <a href="app-contact-grid.html" class="btn btn-primary">Grid view</a> --}}
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                    data-target="#addCategory">Add New Category</button>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>User List</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover mb-0 c_list">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="fancy-checkbox">
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Cretaed Date</th>
                                        <th>Updated By</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" name="checkbox"
                                                        value="{{ $item->id }}">
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>
                                                {{ $item->category_name }}
                                            </td>
                                            <td>
                                                {{ $item->description }}
                                            </td>
                                            <td>
                                                {{ $item->created_by }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>
                                                {{ $item->updated_by }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger js-sweetalert"
                                                    data-type="confirm" title="Delete"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @if ($data->hasMorePages())
                                    <div x-intersect="$wire.loadMore()" class="flex justify-center py-4 transition-opacity">
                                        <div
                                            class="w-6 h-6 border-2 border-t-blue-500 border-b-blue-500 rounded-full animate-spin">
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-4 text-gray-400">
                                        Kamu sudah mencapai akhir data.
                                    </div>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Default Size -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form wire:submit="save">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="title" id="defaultModalLabel">Add New Category</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-6">
                                <div class="form-group">
                                    <input wire:model='category_name' type="text" class="form-control"
                                        placeholder="Category Name" required="Category tidak boleh kosong">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea wire:model='description' class="form-control" rows="5"
                                        cols="30"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('data-created', () => {
                $('#addCategory').modal('hide');
                $('.modal-backdrop').remove(); // hapus backdrop
                // $('body').removeClass('modal-open').css('padding-right', '');
                Swal.fire({
                    title: "Horay!",
                    text: "Category Product Berhasil Ditambahkan!",
                    icon: "success"
                });
            });
        });
    </script>
@endpush