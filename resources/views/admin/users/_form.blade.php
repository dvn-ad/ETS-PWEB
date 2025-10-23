@php($editing = isset($user))
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="display:grid; gap:8px; max-width:520px;">
    <label>
        Name
        <input type="text" name="name" value="{{ old('name', $editing ? $user->name : '') }}" required />
    </label>

    <label>
        Email
        <input type="email" name="email" value="{{ old('email', $editing ? $user->email : '') }}" required />
    </label>
    <!-- pw blank == no update -->
    <label>
        Password {{ $editing ? '(leave blank to keep current)' : '' }}
        <input type="password" name="password" {{ $editing ? '' : 'required' }} />
    </label>

    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $editing && $user->is_admin ? 1 : 0) ? 'checked' : '' }} style="width: auto; margin: 0;" />
        <span>Admin User</span>
    </label>
</div>
