<div>
   <div id="main-content">
      <div class="container-fluid">
         <div class="block-header">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <h2>Product List</h2>
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-dashboard"></i></a>
                     </li>
                     <li class="breadcrumb-item">Master</li>
                     <li class="breadcrumb-item active">Product List</li>
                  </ul>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="d-flex flex-row-reverse">
                     <div class="page_action">
                        <!-- Tombol Scan QR -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                           data-target="#qrScannerModal">
                           <i class="fa fa-qrcode"></i> Scan QR Produk
                        </button> --}}
                        <button id="btnScan" class="btn btn-primary"><i class="fa fa-qrcode"></i> Mulai Scan</button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                           data-target="#addProduct">Add New Product</button>
                     </div>
                     <div class="p-2 d-flex"></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="row justify-content-center">
            <div class="d-flex justify-content-center align-items-center">
               <div id="reader" style="width: 300px; display: none;"></div>
            </div>
         </div>

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
                              {{-- <th>Tanggal Re-Stok Terakhir</th> --}}
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                        <tr>
                          <td style="width: 50px;">
                            <label class="fancy-checkbox">
                              <input class="checkbox-tick" type="checkbox" name="checkbox"
                                 value="{{ $item->product_uid }}">
                              <span></span>
                            </label>
                          </td>
                          <td>{{ $item->barcode }}</td>
                          <td>{{ $item->product_name }}</td>
                          <td>{{ number_format($item->capital_price, 0, ',', '.') }}</td>
                          <td>{{ number_format($item->selling_price, 0, ',', '.') }}</td>
                          <td>{{ $item->category_id }}</td>
                          <td>{{ $item->inventory->quantity }}</td>
                          {{-- <td>{{ $item->updated_at ? $item->updated_at->format('d/m/Y') : 'N/A' }}</td> --}}
                          <td>
                            <button type="button" class="btn btn-primary" title="Edit">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger js-sweetalert" data-type="confirm"
                              title="Delete">
                              <i class="fa fa-trash-o"></i>
                            </button>
                          </td>
                        </tr>
                     @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Modal Add Product -->
   <div class="modal" id="addProduct" tabindex="-1" role="dialog">
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
                        <input wire:model="barcode" type="text" id="barcode" class="form-control" required>
                     </div>
                     <div class="col-6"></div>
                     <div class="col-6">
                        <label class="mt-2">Kategori Produk</label>
                        <div class="c_multiselect">
                           <select id="single-selection" name="single_selection" class="multiselect multiselect-custom"
                              style="display: none;">
                              <option value="cheese">Cheese</option>
                           </select>
                           <div class="btn-group">
                              <button type="button" class="multiselect dropdown-toggle btn btn-default"
                                 data-toggle="dropdown" title="Mozzarella" aria-expanded="false">
                                 <span class="multiselect-selected-text">Mozzarella</span>
                                 <b class="caret"></b>
                              </button>
                              <ul class="multiselect-container dropdown-menu"
                                 style="max-height: 300px; overflow: hidden auto;">
                                 <li><a tabindex="0"><label class="radio"><input type="radio" value="cheese">
                                          Cheese</label></a></li>
                                 <li><a tabindex="0"><label class="radio"><input type="radio" value="tomatoes">
                                          Tomatoes</label></a></li>
                                 <li class="active"><a tabindex="0"><label class="radio"><input type="radio"
                                             value="mozarella"> Mozzarella</label></a></li>
                                 <li><a tabindex="0"><label class="radio"><input type="radio" value="mushrooms">
                                          Mushrooms</label></a></li>
                                 <li><a tabindex="0"><label class="radio"><input type="radio" value="pepperoni">
                                          Pepperoni</label></a></li>
                                 <li><a tabindex="0"><label class="radio"><input type="radio" value="onions">
                                          Onions</label></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <label class="mt-2">Nama Produk</label>
                        <input wire:model="product_name" type="text" id="name" class="form-control">
                     </div>
                     <div class="col-6">
                        <label class="mt-2">Harga Modal</label>
                        <input wire:model="capital_price" type="text" class="form-control">
                     </div>
                     <div class="col-6">
                        <label class="mt-2">Harga Jual</label>
                        <input wire:model="selling_price" type="text" class="form-control" required>
                     </div>
                     <div class="col-6">
                        <label class="mt-2">Qty</label>
                        <input wire:model="quantity" type="number" class="form-control" required>
                     </div>
                     <div class="col-6">
                        <label class="mt-2">Tanggal Re-Stok Produk</label>
                        <input wire::model="reorder_level" data-provide="datepicker" data-date-autoclose="true"
                           class="form-control" placeholder="Ex: 30/07/2016">
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
      let html5QrCode = null;
      let scanning = false;

      document.getElementById("btnScan").addEventListener("click", function () {
        const readerDiv = document.getElementById("reader");
        const btn = this;

        $('#qrScannerModal').modal('show');

        if (!scanning) {
          readerDiv.style.display = "block";
          html5QrCode = new Html5Qrcode("reader");

          html5QrCode.start(
            { facingMode: "environment" }, // cuma 1 key!
            { fps: 10, qrbox: 250 },
            (decodedText) => {
               console.log(`QR Code: ${decodedText}`);
               let barcodeInput = document.getElementById("barcode");
               barcodeInput.value = decodedText;
               barcodeInput.dispatchEvent(new Event('input'));
               html5QrCode.stop().then(() => {
                 readerDiv.style.display = "none";
                 btn.textContent = "Mulai Scan";
                 scanning = false;
                 $('#addProduct').modal('show');
               }).catch(err => {
                 console.error(`Gagal menghentikan scanner: ${err}`);
               });
            },
            (errorMessage) => {
               // QR tidak terbaca
            }
          ).then(() => {
            scanning = true;
            btn.textContent = "Stop Scan QR";

            // 🔹 Set fokus & zoom setelah kamera nyala
            setTimeout(() => {
               const videoElem = document.querySelector("#reader video");
               if (videoElem) {
                 const track = videoElem.srcObject.getVideoTracks()[0];
                 const capabilities = track.getCapabilities();
                 console.log("Camera capabilities:", capabilities);

                 let newConstraints = {};
                 if (capabilities.focusMode) {
                   newConstraints.focusMode = "continuous";
                 }
                 if (capabilities.zoom) {
                   newConstraints.zoom = capabilities.zoom.max / 2; // zoom 50% dari maksimal
                 }

                 track.applyConstraints({ advanced: [newConstraints] })
                   .then(() => console.log("Camera constraints applied:", newConstraints))
                   .catch(err => console.warn("Tidak bisa set constraints:", err));
               }
            }, 1000); // tunggu 1 detik supaya kamera ready
          }).catch(err => {
            console.error(`Gagal memulai scanner: ${err}`);
          });

        } else {
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
          $('#addProduct').modal('hide');
          $('.modal-backdrop').remove();
          Swal.fire({
            title: "Horay!",
            text: "Product Berhasil Ditambahkan!",
            icon: "success"
          });
        });
      });
   </script>
@endpush