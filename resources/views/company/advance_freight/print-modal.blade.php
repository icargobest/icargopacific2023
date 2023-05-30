<head>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <strong>{{ $err }}</strong>
        @endforeach
    @endif
</head>

<button type="button" class="btn created-button mx-auto my-2" data-bs-toggle="modal"
    data-bs-target="#printModal{{ $ship->id }}">Print</button>

{{-- TRANSFER MODAL --}}
<div class="modal top fade" id="printModal{{ $ship->id }}" tabindex="-1" aria-labelledby="printModal" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModal">PRINT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="button-modal-container">
                    <div class="rightmodal-button-container">
                        <a href="{{ route('company.generateInvoice', $ship->id) }}" target="_blank">
                            <button type="button" class="btn created-button mx-auto">
                                Invoice
                            </button>
                        </a>
                        <a href="{{ route('company.generateWaybill', $ship->id) }}" target="_blank">
                            <button type="button" class="btn created-button mx-auto">
                                Waybill
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
