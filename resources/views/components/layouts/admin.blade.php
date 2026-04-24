<x-app-layout>

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-slate-900 text-white p-6 fixed h-full">

        <h1 class="text-2xl font-bold mb-8 flex items-center gap-2">
            🗳 Voting Admin
        </h1>

        <nav class="space-y-3">

            <a href="/dashboard"
            class="block px-4 py-3 rounded-xl bg-blue-600 font-semibold">
                Dashboard
            </a>

            <a href="/candidates/create"
            class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Tambah Ketua
            </a>

            <a href="/candidates"
            class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Data Ketua
            </a>

            <a href="/voters"
            class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Data Pemilih
            </a>

            <a href="/results"
            class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Hasil Voting
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-3 rounded-xl hover:bg-red-600">
                    Logout
                </button>
            </form>

        </nav>

    </div>

    <!-- Content -->
    <div class="flex-1 ml-64 bg-gray-100 min-h-screen p-8">
        {{ $slot }}
    </div>

</div>

</x-app-layout>