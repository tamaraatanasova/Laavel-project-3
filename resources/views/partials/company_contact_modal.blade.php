<!-- Company Contact Modal -->
<div class="modal fade" id="companyContactModal" tabindex="-1" aria-labelledby="companyContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('company.contact.submit') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="companyContactModalLabel">Вработи наш студент</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-text text-secondary">Внесете Ваши податоци за да стапиме во контакт:</p>
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label">E-мејл</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="companyEmail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="companyPhone" class="form-label">Телефонски број</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" id="companyPhone" name="companyPhone" value="{{ old('company') }}" required>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Компанија</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" required>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12">
                        <button type="submit" class="btn btn-yellow w-100">Испрати</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
