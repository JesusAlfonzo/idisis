<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-header bg-primary text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="mb-0"><i class="fas fa-truck"></i> Datos del Proveedor</h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $supplier->name ?? '') }}" required autocomplete="off">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="rif" class="form-label fw-semibold">RIF <span class="text-danger">*</span></label>
                        <input type="text" name="rif" id="rif" class="form-control form-control-lg @error('rif') is-invalid @enderror" value="{{ old('rif', $supplier->rif ?? '') }}" required autocomplete="off">
                        @error('rif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_person" class="form-label fw-semibold">Persona de Contacto</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control form-control-lg @error('contact_person') is-invalid @enderror" value="{{ old('contact_person', $supplier->contact_person ?? '') }}" autocomplete="off">
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email', $supplier->email ?? '') }}" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-semibold">Teléfono</label>
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone', $supplier->phone ?? '') }}" autocomplete="off">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
