@extends('layouts.app')


@section("content")
    <div class="container">
        <form id="add-sale" action="{{ route("sales.update",$sale->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/payments" class="btn btn-outline-secondary">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tables as $table)
                                    <div class="col-md-3">
                                        <div class="card p-2 mb-2 d-flex
                                                    flex-column justify-content-center
                                                    align-items-center
                                                    list-group-item-action">
                                            <div class="align-self-end">
                                                <input type="checkbox" name="table_id[]"
                                                    id="table"
                                                    checked
                                                    value="{{ $table->id }}"
                                                >
                                            </div>
                                            <i class="fa fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->name }}
                                            </span>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        @foreach($menus as $menu)
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex
                                    flex-column justify-content-center
                                    align-items-center">
                                        <div class="align-self-end">
                                            <input type="checkbox" name="menu_id[]"
                                                id="menu_id"
                                                checked
                                                value="{{ $menu->id }}"
                                            >
                                        </div>
                                        <img
                                            src="{{ asset("images/menus/". $menu->image) }}" alt="{{ $menu->title}}"
                                            class="img-fluid rounded-circle"
                                            width="100"
                                            height="100"
                                        >
                                        <h5 class="font-weight-bold mt-2">
                                            {{ $menu->title }}
                                        </h5>
                                        <h5 class="text-muted">
                                            {{ $menu->price }} 
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <select name="servant_id" class="form-control">
                                    <option value="" selected disabled>
                                        Pelayan
                                    </option>
                                    @foreach ($servants as $servant)
                                        <option
                                            {{ $servant->id === $sale->servant_id ? "selected" : "" }}
                                            value="{{ $servant->id }}">
                                            {{ $servant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Jumlah Menu
                                    </div>
                                </div>
                                <input type="number"
                                    name="quantity"
                                    class="form-control"
                                    placeholder="Jumlah Menu"
                                    value="{{ $sale->quantity }}"
                                >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="total_price"
                                    class="form-control"
                                    placeholder="Uang Pembeli"
                                     value="{{ $sale->total_price }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .000
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="total_received"
                                    class="form-control"
                                    placeholder="Total Harga"
                                     value="{{ $sale->total_received }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .000
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="change"
                                    class="form-control"
                                    placeholder="Sisa Kembalian"
                                     value="{{ $sale->change }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .000
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="payment_type" class="form-control">
                                    <option value="" selected disabled>
                                        Jenis Pembayaran
                                    </option>
                                    <option value="cash"
                                        {{ $sale->payment_type === "cash" ? "selected" : ""}}
                                        >
                                        Uang Tunai
                                    </option>
                                    <option value="card"
                                    {{ $sale->payment_type === "card" ? "selected" : ""}}
                                    >
                                        kartu Debit
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="payment_status" class="form-control">
                                    <option value="" selected disabled>
                                        Status Pembayaran
                                    </option>
                                    <option value="paid" {{ $sale->payment_status === "paid" ? "selected" : ""}}>
                                        Dibayar
                                    </option>
                                    <option value="unpaid" {{ $sale->payment_status === "unpaid" ? "selected" : ""}}>
                                        Belum Dibayar
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button
                                    onclick="event.preventDefault();
                                        document.getElementById("add-sale").submit();
                                    "
                                    class="btn btn-primary"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
