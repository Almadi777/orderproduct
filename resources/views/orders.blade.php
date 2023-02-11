<table class="table table-bordered" id="orders-table">
    <thead>
    <tr>
        <th>Order Date</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Order Amount</th>
    </tr>
    </thead>
</table>

<script>
    $(function () {
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('orders.data') !!}',
            columns: [
                {data: 'order_date', name: 'order_date'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'order_amount', name: 'order_amount'}
            ]
        });
    });
</script>
