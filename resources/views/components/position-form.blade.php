@props(['company' => $company])

<div>
    <form action="{{ route('position.post') }}" method="post">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
        <textarea name="description">{{ old('description') }}</textarea> 
        @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror   
        <button class="bg-blue-500 hover:bg-blue-600 fond-bold text-white px-4 py-1 rounded" type="submit">Save</button>
    </form>
</div>