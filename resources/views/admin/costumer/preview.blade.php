<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="Preview Identitas Customer" />
    </x-slot:breadcrumbs>
    <div class="container">
        <div class="card">
          <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
            <figure class="relative h-96" style="width:60%">
              <div class="grid min-h-[140px] place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                <img
                  class="object-cover object-center w-full rounded-lg shadow-xl h-96 shadow-blue-gray-900/50"
                  src="{{ $costumer->imageUrl }}"
                  alt="nature image"
                />
              </div>
              <figcaption
                class="absolute bottom-2 left-2/4 flex w-[calc(100%-4rem)] -translate-x-2/4 justify-between rounded-xl border border-white bg-white/75 py-1  px-6 shadow-lg shadow-black/5 saturate-200 backdrop-blur-sm">
                <div>
                  <h5
                    class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $costumer->name }}
                  </h5>
                  <h5
                    class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $costumer->email }}
                  </h5>
                </div>
                <div>
                  <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $costumer->gender }}
                  </h5>
                  <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $costumer->phone }}
                  </h5>
                </div>
              </figcaption>
            </figure>
          </div>
            <a href="{{ route('admin.costumer.index') }}" style="width: 10%"
                class="mx-5 d-block btn btn-warning mb-4">Back</a>
        </div>
        
    </div>



</x-admin-layouts>
