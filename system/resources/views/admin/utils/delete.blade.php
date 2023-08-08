<form action="{{ $url }}" method="post" class="form-inline"
    onsubmit="return confirm('Yakin Akan Menghapus Data Ini')">
    @csrf
    @method('delete')
    <button class="btn btn-outline-dark m-l-2"><i class="bx bx-trash me-1"></i> Hapus</button>
</form>
