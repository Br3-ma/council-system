<form action="{{ route('streams.update', $stream->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="w-full text-left">
        <div class="flex gap-2">
            <input value="{{ $stream->name }}" placeholder="Name" name="name" type="text" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
            &nbsp;
            <input value="{{ $stream->code }}" placeholder="Code" name="code" type="text" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
        </div>
        <br>
        <div class="mt-2">
            <select name="type" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                <option value="">--Type--</option>
                <option value="market" {{ $stream->type === 'market' ? 'selected' : '' }}>Market</option>
                <option value="customs" {{ $stream->type === 'customs' ? 'selected' : '' }}>Customs</option>
                <option value="toilet" {{ $stream->type === 'toilet' ? 'selected' : '' }}>Toilet</option>
                <option value="sand" {{ $stream->type === 'sand' ? 'selected' : '' }}>Sand</option>
                <option value="charcoal" {{ $stream->type === 'charcoal' ? 'selected' : '' }}>Charcoal</option>
            </select>
        </div>
        
        <div class="relative mt-2">
            <textarea name="description" rows="3" cols="3" placeholder="Description" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ $stream->description }}</textarea>
        </div>
        
        <div class="relative mt-2">
            <textarea name="icon" rows="3" cols="3" placeholder="Icon" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ $stream->icon }}</textarea>
        </div>
        <div class="flex gap-2">
            <input value="{{ $stream->amount }}" placeholder="Charge Amount .ex 2.50" name="amount" type="text" class="custom-input-date custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
        </div>
    </div> 

    <div class="relative pt-6">
        <button type="submit" class="mt-2 flex items-center gap-2 rounded bg-secondary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
            Save
        </button>
    </div>
</form>
