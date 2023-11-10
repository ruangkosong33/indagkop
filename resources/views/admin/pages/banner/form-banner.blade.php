<x-modal size="modal-md">

    <x-slot name="title">
        Tambah Banner
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="title_banner">Judul</label>
                <input type="text" name="title_banner" id="title_banner" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" name="image" placeholder="Pilih Banner"
                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">

                <div class="mt-3"><img src="" id="output" width="400"></div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
