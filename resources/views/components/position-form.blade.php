@props(['company' => $company])

<div class="m-4 max-w-md">
    <form action="{{ route('position.post') }}" method="post">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        <div>
            <input required class="relative block w-full px-2 py-1.5 border border-gray-300 border-2 rounded-lg" type="text" name="title" placeholder="{{ __('positions.Title') }}" value="{{ old('title') }}">
            @error('title')
                <div class="text-red-500 my-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <textarea required placeholder="{{ __('positions.Description') }}" class="relative block w-full px-2 py-1.5 border border-gray-300 border-2 rounded-lg" name="description">{{ old('description') }}</textarea> 
            @error('description')
                <div class="text-red-500 my-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="mt-2 btn btn-blue" type="submit">{{ __('positions.Add') }}</button>
    </form>
</div>