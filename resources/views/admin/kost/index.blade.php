<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="Kost" />
    </x-slot:breadcrumbs>

    <div class="container-fluid py-1">
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <div class="relative mx-4  overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
              <div class="flex items-center justify-between gap-8 mb-8">
                <div>
                  <h5
                    class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    Kost list
                  </h5>
                  <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                    See information about all Kost
                  </p>
                </div>
                <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                 @include('admin.kost.create')
                </div>
              </div>
            </div>
            <div class=" px-0 overflow-scroll">
              <table class="w-full mt-4 text-left table-auto min-w-max">
                <thead>
                  <tr>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Ruangan
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Harga Perbulan
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Harga Pertahun
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Deskripsi
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Status
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                        Action
                      </p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($kost as $ks )
                    <tr>
                      <td class="p-4 border-b border-blue-gray-50">
                        <div class="flex items-center gap-3">
                          <img src="{{$ks->imageUrl}}"
                            alt="John Michael" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                          <div class="flex flex-col">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                              {{ $ks->room }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="p-4 border-b border-blue-gray-50">
                        <div class="flex flex-col">
                          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Rp.{{number_format($ks->price_month,2)  }}
                          </p>
                        </div>
                      </td>
                      <td class="p-4 border-b border-blue-gray-50">
                        <div class="flex flex-col">
                          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Rp.{{number_format($ks->price_years,2)  }}
                          </p>
                        </div>
                      </td>
                      <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                          {!! $ks->description !!}
                        </p>
                      </td>
                      <td class="p-4 border-b border-blue-gray-50">
                        <div class="w-max">
                            @if ($ks->status == 'Ada')
                            <div
                              class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                              <span class="">{{ $ks->status }}</span>
                            </div>
                            @else
                            <div
                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-black uppercase rounded-md select-none whitespace-nowrap bg-red-500">
                            <span class="">{{ $ks->status }}</span>
                          </div>
                            @endif
                        </div>
                      </td>
                      <td class="p-4 border-b border-blue-gray-50">
                        <a href="{{ route('admin.kost.edit', $ks->id) }}"
                            class="mdi mdi-tooltip-edit manu-icon btn btn-primary mb-4"></a>
                        <form action="{{ route('admin.kost.delete', $ks->id) }}" data-confirm-delete="true"
                            method="POST" onsubmit="return confirm('Yakin Anda Ingin Menghapus?')"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="mdi mdi-delete-forever manu-icon btn btn-danger bg-red-800 mb-4"></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                Page 1 of 10
              </p>
              <div class="flex gap-2">
                <button
                  class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  type="button">
                  Previous
                </button>
                <button
                  class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  type="button">
                  Next
                </button>
              </div>
            </div>
          </div>
    </div>
</x-admin-layouts>
