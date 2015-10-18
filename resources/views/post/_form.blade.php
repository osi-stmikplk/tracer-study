{{-- form ini harusnya di include lagi oleh tipe polymorphis yang lain ... --}}
<div class="form-group">
    <label for="judul" class="col-md-3 control-label">{{ $judul_label or "Judul" }}</label>
    <div class="col-md-9">
        <input type="text" id="judul" class="form-control" name="judul"
               value="{{ load_input_value($post, "judul") }}" maxlength="255">
        <div id="error-judul" class="error"></div>
    </div>
</div>
<div class="form-group">
    <label for="isi" class="col-md-3 control-label">{{ $isi_label or "Isi" }}</label>
    <div class="col-md-9">
        <textarea id="isi" class="form-control" name="isi">{{ load_input_value($post, "isi") }}</textarea>
        <div id="error-isi" class="error"></div>
    </div>
</div>