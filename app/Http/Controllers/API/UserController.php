<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function updateProfilePicture(Request $request, $id)
    {
        // Get the user record from the database
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found']);
        }

        // Check if the authenticated user has permission to update the profile picture
        if ($request->user()->id !== $id) {
            return response()->json(['message' => 'Unauthorized for user: ' . $request->user()->id, $id]);
        }

        // Validate the uploaded image
        $request->validate([
            'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Resize and save the image
        $fileName = time() . '.' . $request->pfp->extension();
        $request->pfp->storeAs('public/images', $fileName);
        $imagePath = public_path('storage/images/' . $fileName);
        list($width, $height) = getimagesize($imagePath);
        $newWidth = 400;
        $newHeight = 400;
        $image = imagecreatefromstring(file_get_contents($imagePath));
        $resizedImage = imagescale($image, $newWidth, $newHeight);
        imagejpeg($resizedImage, $imagePath);
        imagedestroy($image);
        imagedestroy($resizedImage);

        // Update the user record with the new profile picture filename
        $user->update([
            'pfp' => $fileName,
        ]);

        // Return a JSON response with a success message
        return response()->json(['message' => 'Profile picture updated successfully']);
    }
}
