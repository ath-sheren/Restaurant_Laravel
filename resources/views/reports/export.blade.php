<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Menu</th>
            <th>Meja</th>
            <th>Pelayan</th>
            <th>Jumlah Menu</th>
            <th>Total Bayar</th>
            <th>Jenis Pembayaran</th>
            <th>Status Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>
                    {{ $sale->id }}
                </td>
                <td>
                    @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                        <h5>
                            {{ $menu->title }}
                        </h5>
                        <h5>
                            {{ $menu->price }} IDR
                        </h5>
                    @endforeach
                </td>
                <td>
                    @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                        <h5>
                            {{ $table->name }}
                        </h5>
                    @endforeach
                </td>
                <td>
                    {{ $sale->servant->name}}
                </td>
                <td>
                    {{ $sale->quantity}}
                </td>
                <td>
                    {{ $sale->total_received}}
                </td>
                <td>
                    {{ $sale->payment_type === "cash" ? "Cash" : "Kartu Debit"}}
                </td>
                <td>
                    {{ $sale->payment_status === "paid" ? "Dibayar" : "Belum Dibayar"}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Laporan dari {{ $from }} sampai {{ $to }}
            </td>
            <td>
                {{ $total }} IDR
            </td>
        </tr>
    </tbody>
</table>
