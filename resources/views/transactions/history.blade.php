@extends('layout/main')
@section('title', "History")
@section('container')

<div class="container">
    <div class="row align-items-center justify-content-center">
        @foreach ($histories as $index => $history )
            <div class="col-8">
                <div class="accordion" id="transactionAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapse" . $index}}" aria-expanded="true" aria-controls="{{"collapse" . $index}}">
                            Transaction Date {{$history->created_at}}
                        </button>
                        </h2>
                        <div id="{{"collapse" . $index}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#transactionAccordion">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history->transactionDetail as $item)
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->product->price * $item->qty}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="fw-bold">Total</td>
                                        <td class="fw-bold">{{$history->totalQty}}</td>
                                        <td class="fw-bold">{{$history->totalPrice}}</td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>



</script>
@endsection
