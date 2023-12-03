<h1>Chat Room</h1>

<div id="chat-box">
    @foreach ($messages as $message)
        <p><strong>{{ $message->user->name }}:</strong> {{ $message->message }}</p>
    @endforeach
</div>

<form method="POST" action="/send_message">
    @csrf
    <input type="text" name="message" placeholder="Ketik pesan...">
    <button type="submit">Kirim</button>
</form>
