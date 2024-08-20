<x-app-layout>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto w-9/12">
                            <thead>
                                <tr>
                                    <th>Client Id</th>
                                    <th>Number Of Payment</th>
                                    <th>First Payment Date</th>
                                    <th>last Payment Date</th>
                                    <th>Loan Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->client_id}}</td>
                                        <td>{{$item->num_of_payment}}</td>
                                        <td>{{$item->first_payment_date}}</td>
                                        <td>{{$item->last_payment_date}}</td>
                                        <td>{{$item->loan_amount}}</td>
                                        
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<form action="{{route('emi_data')}}" method="get">
    <button  type="submit">process Data</button>
</form>



    </div>
</x-app-layout>
