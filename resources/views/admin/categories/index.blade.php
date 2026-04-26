@extends('layouts.admin')
@section('page-title', 'Manage Categories')
@section('content')
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="row g-4">
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-header"><strong>Add New Category</strong></div>
      <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Category Name *</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-dark w-100">Add Category</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-header"><strong>All Categories ({{ $categories->count() }})</strong></div>
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-dark"><tr><th>ID</th><th>Name</th><th>Slug</th><th>Status</th><th>Actions</th></tr></thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <td>{{ $cat->id }}</td>
              <td>{{ $cat->name }}</td>
              <td><small class="text-muted">{{ $cat->slug }}</small></td>
              <td><span class="badge bg-{{ $cat->is_active?'success':'secondary' }}">{{ $cat->is_active ? 'Active' : 'Inactive' }}</span></td>
              <td>
                <button type="button" class="btn btn-sm btn-outline-dark me-1"
                  onclick="editCat({{ $cat->id }}, '{{ $cat->name }}', '{{ $cat->is_active ? 'active' : 'inactive' }}')">Edit</button>
                <form action="{{ route('admin.categories.delete', $cat->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Edit Category</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <form id="editForm" method="POST">
        @csrf @method('PUT')
        <div class="modal-body">
          <div class="mb-3"><label class="form-label">Name</label><input type="text" name="name" id="editName" class="form-control" required></div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" id="editStatus" class="form-select">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-dark">Update</button></div>
      </form>
    </div>
  </div>
</div>
<script>
function editCat(id, name, status) {
  document.getElementById('editForm').action = '/admin/categories/' + id;
  document.getElementById('editName').value = name;
  document.getElementById('editStatus').value = status;
  new bootstrap.Modal(document.getElementById('editModal')).show();
}
</script>
@endsection
