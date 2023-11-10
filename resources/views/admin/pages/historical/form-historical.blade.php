<x-modal size="modal-md">

    <x-slot name="title">
        Tambah Sejarah Pembentukan
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="title_historical">Judul</label>
                <input type="text" name="title_historical" id="title_historical" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" placeholder="Sejarah Dinas"></textarea>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>
