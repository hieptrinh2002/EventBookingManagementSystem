<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Helpers\ApiHelper;
use Illuminate\Http\Client\Response;

class EventService
{
    public static function getAllEvents()
    {
        // Gọi API service để lấy danh sách event
        $response = Http::get(env('EVENT_API_URL'));
        return $response->json();
    }

    public static function createEvent(array $data)
    {
        // Gọi API service để tạo event mới
        $response = Http::post("http://localhost:8080/event/api/create", $data);
        dd($response);
        return $response->successful();
    }

    public function create($request): mixed
    {
        $dataCreate = $request->all();
        $response = Http::post(env('EVENT_API_URL'), $dataCreate);
        return $response->successful();
    }

    public function update($request, $id)
    {
    }

    protected function generateSignature(): string
    {
        // Tại đây bạn sẽ cần viết logic để tạo ra signature dựa trên một số thông tin như:
        // - Thời gian hiện tại
        // - Mã định danh của người dùng
        // - Một số thông tin bí mật (secret key)
        // Signature này sẽ được sử dụng để xác thực yêu cầu ở phía server

        $timestamp = now()->format('Y-m-d H:i:s');
        $userId = auth()->id();
        $secretKey = config('app.secret_key');
        $signature = hash_hmac('sha256', $timestamp . $userId, $secretKey);

        return $signature;
    }
}
