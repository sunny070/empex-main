@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 mb-10 mt-5">
    <div class="w-full flex justify-between">
        <div class="text-sm font-semibold ml-5">
            EmploymentNCS News
        </div>
        <div>
            {{-- @if ($unpublished > 0) --}}
            {{-- <a href="{{ route('unpublished.job') }}"
                class="bg-empex-yellow mr-3 text-black rounded px-4 py-1 text-base font-medium hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                {{-- ({{ $unpublished }}) unpublished jobs post --}}
                {{-- </a> --}}
            {{-- @endif --}}

            <a href="{{ route('create.jobs.postNcs') }}" :active="request()->routeIs('jobsPostNcs')"
                class="bg-empex-green text-white rounded px-4 py-1 text-base font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                Add NCS
            </a>
            {{-- @if(session('success'))
            <div>

            </div>
            <div class="flex justify-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            @else
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                {{ session('error') }}
            </div>

            @endif --}}


        </div>
    </div>

    <div class="mt-5">
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wide">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wide">
                                        Organization Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wide">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wide">
                                        No of Posts
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wide">
                                        Due Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right font-medium uppercase tracking-wide">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            {{-- @empty --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap" colspan="5">Jobs not found</td>
                            </tr>
                            {{-- @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="py-2">
                {{-- {{ $jobs->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>

</div>
@endsection