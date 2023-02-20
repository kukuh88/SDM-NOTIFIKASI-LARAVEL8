<!-- notifications.blade.php -->
<div class="notifications-container">
    <h3>Notifications</h3>
    <ul>
        @foreach ($notifications as $notification)
            <li>{{ $notification->message }}</li>
        @endforeach
    </ul>
</div>
<div class="header">
    <!-- ... -->
    <div class="notification-icon">
        <a href="#">
            <i class="bi bi-bell"></i>
            @if ($unreadNotificationsCount > 0)
                <span class="badge">{{ $unreadNotificationsCount }}</span>
            @endif
        </a>
        @include('header')
    </div>
    <!-- ... -->
</div>
