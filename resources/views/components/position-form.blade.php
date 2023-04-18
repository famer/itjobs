@props(['company' => $company])

<div class="m-4">
    <form action="{{ route('position.post') }}" method="post">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        <div>
            <input class="w-1/4 px-2 py-1.5 border border-gray-300 border-2 rounded-lg" type="text" name="title" placeholder="title" value="{{ old('title') }}">
            @error('title')
                <div class="text-red-500 my-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <textarea placeholder="description" class="w-1/4 px-2 py-1.5 border border-gray-300 border-2 rounded-lg" name="description">{{ old('description') }}</textarea> 
            @error('description')
                <div class="text-red-500 my-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="bg-blue-500 hover:bg-blue-600 fond-bold text-white px-4 py-1 rounded" type="submit">Save</button>
    </form>
</div>