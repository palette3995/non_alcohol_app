<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-center">
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ユーザー名</th>
                            <th class="border px-4 py-2">メールアドレス</th>
                            <th class="border px-4 py-2">年齢</th>
                            <th class="border px-4 py-2">性別</th>
                            <th class="border px-4 py-2">登録日時</th>
                            <th class="border px-4 py-2">更新日時</th>
                            <th class="border px-4 py-2">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{$user->name}}</td>
                                <td class="border px-4 py-2">{{$user->email}}</td>
                                <td class="border px-4 py-2">{{$user->age}}</td>
                                <td class="border px-4 py-2">{{$user->gender}}</td>
                                <td class="border px-4 py-2">{{$user->created_at}}</td>
                                <td class="border px-4 py-2">{{$user->updated_at}}</td>
                                <td class="border px-4 py-2">
                                    <form method="POST" action="{{ route('user.delete') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button id="delete-{{ $user->id }}" data-id="{{ $user->id }}" type="submit" class="shadow-lg bg-gray-500 text-white rounded px-2 py-1" onclick="deleteUser(this)">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deleteUser(e) {
        if (confirm('ユーザーを削除しますか？')) {
            document.getElementById('delete-' + e.dataset.id).submit()
        }
    }
</script>
