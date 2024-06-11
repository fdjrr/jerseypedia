@use(Carbon\Carbon)

<footer class="text-center mt-4">
    <p>Copyright &copy; {{ Carbon::now()->format('Y') }} - {{ config('app.name') }}</p>
</footer>