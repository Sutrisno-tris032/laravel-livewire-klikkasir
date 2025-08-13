<div>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Product List</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">Master</li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button id="btnScan" class="btn btn-primary">Mulai Scan</button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                    data-target="#addProduct">Add New Product</button>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="reader" style="width: 600px; display: none;"></div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Product List</h2>
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
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Modal</th>
                                        <th>Harga Jual</th>
                                        <th>Kategori Produk</th>
                                        <th>Qty</th>
                                        <th>Tanggal Re-Stok Terakhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td style="width: 50px;">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox"
                                                    value="">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Edit"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger js-sweetalert"
                                                data-type="confirm" title="Delete"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Default Size -->
    <div class="modal " id="addProduct" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit="save">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="title" id="defaultModalLabel">Add New Product</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-6">
                                <label class="mt-2">Kode Produk</label>
                                <input wire:model='kode_produk' type="text" id="kode_pruduk" class="form-control"
                                    required="" readonly>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6">
                                <label class="mt-2">Kategori Produk</label>
                                <div class="c_multiselect">
                                    <select id="single-selection" name="single_selection"
                                        class="multiselect multiselect-custom" style="display: none;">
                                        <option value="cheese">Cheese</option>
                                    </select>
                                    <div class="btn-group"><button type="button"
                                            class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown"
                                            title="Mozzarella" aria-expanded="false"><span
                                                class="multiselect-selected-text">Mozzarella</span> <b
                                                class="caret"></b></button>
                                        <ul class="multiselect-container dropdown-menu"
                                            style="max-height: 300px; overflow: hidden auto;">
                                            <li class=""><a tabindex="0"><label class="radio"><input
                                                            type="radio" value="cheese"> Cheese</label></a></li>
                                            <li class=""><a tabindex="0"><label class="radio"><input
                                                            type="radio" value="tomatoes"> Tomatoes</label></a>
                                            </li>
                                            <li class="active"><a tabindex="0"><label class="radio"><input
                                                            type="radio" value="mozarella">
                                                        Mozzarella</label></a></li>
                                            <li><a tabindex="0"><label class="radio"><input type="radio"
                                                            value="mushrooms"> Mushrooms</label></a></li>
                                            <li><a tabindex="0"><label class="radio"><input type="radio"
                                                            value="pepperoni"> Pepperoni</label></a></li>
                                            <li><a tabindex="0"><label class="radio"><input type="radio"
                                                            value="onions"> Onions</label></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Nama Produk</label>
                                <input wire:model='category_name' type="text" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Harga Modal</label>
                                <input wire:model='category_name' type="text" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Harga Jual</label>
                                <input wire:model='category_name' type="text" class="form-control"
                                    required="">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Qty</label>
                                <input wire:model='category_name' type="number" class="form-control"
                                    required="">
                            </div>
                            <div class="col-6">
                                <label class="mt-2">Tanggal Re-Stok Produk</label>
                                <input data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                    placeholder="Ex: 30/07/2016">
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
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="jquery.maskedinput.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let html5QrCode = null; // untuk simpan instance scanner
        let scanning = false; // status scan

        document.getElementById("btnScan").addEventListener("click", function() {
            const readerDiv = document.getElementById("reader");
            const btn = this;

            if (!scanning) {
                // Mulai scan
                readerDiv.style.display = "block";
                html5QrCode = new Html5Qrcode("reader");

                html5QrCode.start({
                        facingMode: "environment"
                    }, {
                        fps: 10,
                        qrbox: 250
                    },
                    (decodedText, decodedResult) => {
                        console.log(`QR Code: ${decodedText}`);

                        document.getElementById("kode_pruduk").value = decodedText;

                        html5QrCode.stop().then(() => {
                            readerDiv.style.display = "none";
                            btn.textContent = "Mulai Scan";
                            scanning = false;

                            // Munculkan modal
                            $('#addProduct').modal('show');
                        }).catch(err => {
                            console.error(`Gagal menghentikan scanner: ${err}`);
                        });
                    },
                    (errorMessage) => {
                        // console.log(`QR error: ${errorMessage}`);
                    }
                ).then(() => {
                    scanning = true;
                    btn.textContent = "Stop Scan QR";
                }).catch(err => {
                    console.error(`Gagal memulai scanner: ${err}`);
                });

            } else {
                // Stop scan
                html5QrCode.stop().then(() => {
                    readerDiv.style.display = "none";
                    btn.textContent = "Mulai Scan";
                    scanning = false;
                }).catch(err => {
                    console.error(`Gagal menghentikan scanner: ${err}`);
                });
            }
        });

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
