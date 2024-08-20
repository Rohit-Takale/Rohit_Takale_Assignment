<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="py-5 px-4">
                <form action="{{ route('dashboard') }}" method="get">
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"> Back</button>
                </form>
               </div>
               
               <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            @foreach($emiDetails->first() as $column => $value)
                                <th class="py-2 px-4 border-b">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emiDetails as $row)
                            <tr class="hover:bg-gray-100">
                                @foreach($row as $value)
                                    <td class="py-2 px-4 border-b">{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
              
                


            </div>
        </div>
    </div>
</x-app-layout>
