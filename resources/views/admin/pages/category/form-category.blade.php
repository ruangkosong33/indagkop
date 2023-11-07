<x-modal size="modal-md">

    <x-slot name="title">
        Tambah Kategori
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="title_category">Judul</label>
                <input type="text" name="title_category" id="title_category" class="form-control">
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
