<x-modal>

    <x-slot name="title">
        Tambah Berita
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title_post">Judul</label>
                <input type="text" name="title_post" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="categorys">Kategori</label>
                <select name="categorys" id="categorys" class="form-control select2">
                    <option disabled selected>--Pilih--</option>
                    @foreach ($category as $categorys)
                    <option value={{$categorys->id}}>{{$categorys->title_category}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" class="form-control summernote"></textarea>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="date">Tanggal Publish</label>
                <div class="input-group datetimepicker" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option disabled selected>Pilih Salah Satu</option>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image"
                       onchange="preview('.preview-image', this.files[0])">
                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                </div>

                <img src="" class="img-thumbnail preview-image" style="display: none;">

            </div>
        </div>
    </div>
    
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary">Simpan</button>
    </x-slot>

</x-modal>