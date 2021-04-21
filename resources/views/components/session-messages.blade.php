

    @if(session()->has('error'))
        <div class="w-2/3 mx-auto rounded-lg">
            <p class="text-md p-3 font-semibold flex justify-center text-red-500 bg-gray-300">
                {{ session()->get('error') }}
            </p>
        </div>
    @elseif(session()->has('success'))
        <div class="w-2/3 mx-auto rounded-lg">
            <p class="text-md p-3 font-semibold flex justify-center text-green-700 bg-gray-300">
                {{ session()->get('success') }}
            </p>
        </div>
    @endif