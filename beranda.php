<?php
include "config.php";

// Ambil semua postingan (foto atau video)
$query = "SELECT media.MediaID, media.JudulMedia, media.DeskripsiMedia, media.TanggalUnggah, media.LokasiFile, media.JenisMedia, user.Username, user.UserID
          FROM media 
          JOIN user ON media.UserID = user.UserID 
          ORDER BY media.TanggalUnggah DESC";
$result = $koneksi->query($query);

// Looping data postingan
while($post = $result->fetch_assoc()) {
    // Hitung jumlah like untuk media ini
    $like_query = "SELECT COUNT(*) AS jumlah_likes FROM likemedia WHERE MediaID = ".$post['MediaID'];
    $like_result = $koneksi->query($like_query);
    $like_data = $like_result->fetch_assoc();

    // Ambil 2 komentar terbaru untuk media ini
    $comment_query = "SELECT komentarmedia.IsiKomentar, user.Username 
                      FROM komentarmedia 
                      JOIN user ON komentarmedia.UserID = user.UserID 
                      WHERE komentarmedia.MediaID = ".$post['MediaID']." 
                      ORDER BY komentarmedia.TanggalKomentar DESC LIMIT 2";
    $comment_result = $koneksi->query($comment_query);
}
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Visu
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen p-4 border-r border-gray-200">
            <div class="text-2xl font-bold mb-6">
                Visu
            </div>
            <nav class="space-y-4">
                <a class="flex items-center space-x-2 text-lg font-medium text-black" href="#">
                    <i class="fas fa-home">
                    </i>
                    <span>
                        Home
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-search">
                    </i>
                    <span>
                        Search
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-comment-dots">
                    </i>
                    <span>
                        Messages
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-heart">
                    </i>
                    <span>
                        Notifications
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-plus-square">
                    </i>
                    <span>
                        Create
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-user-circle">
                    </i>
                    <span>
                        Profile
                    </span>
                </a>
                <a class="flex items-center space-x-2 text-lg text-gray-600" href="#">
                    <i class="fas fa-bars">
                    </i>
                    <span>
                        More
                    </span>
                </a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="w-3/5 p-4">
             <!-- Post -->
             <div class="bg-white border border-gray-200 rounded-lg mb-6">
                <div class="flex items-center p-4">
                    <img src="https://placehold.co/40x40" alt="User profile" class="rounded-full">
                    <div class="ml-4">
                        <span class="font-medium">tereliye.writer</span>
                        <span class="text-gray-500 text-sm">16h</span>
                    </div>
                    <i class="fas fa-ellipsis-h ml-auto"></i>
                </div>
                <div class="p-4 h-80">
                    <p class="text-center text-xl">Menurut kalian, group K-Pop paling overrated apa? Yang sebenarnya biasa saja?</p>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <i class="far fa-heart text-2xl mr-4"></i>
                        <i class="far fa-comment text-2xl mr-4"></i>
                        <i class="far fa-paper-plane text-2xl ml-auto"></i>
                    </div>
                    <p class="font-medium">7,341 likes</p>
                    <p class="text-gray-500 text-sm">tereliye.writer <span class="font-medium">*Azab akun pemecah belah kuburannya d...</span></p>
                    <p class="text-gray-500 text-sm">View all 93 comments</p>
                    <p class="text-gray-500 text-sm">Add a comment...</p>
                </div>
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="w-1/5 p-4">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img alt="User Profile Picture" class="w-full h-full" height="40"
                            src="https://storage.googleapis.com/a1aa/image/coGfDNR20F06GaSCOpDX18meYWx00QCgSc3P8wF5W73Oe0MnA.jpg"
                            width="40" />
                    </div>
                    <div class="ml-4">
                        <div class="font-bold">
                            reffy_lesmana
                        </div>
                        <div class="text-gray-500 text-sm">
                            yffeR
                        </div>
                    </div>
                </div>
                <a class="text-blue-500 font-bold" href="#">
                    Switch
                </a>
            </div>
            <div class="font-bold text-gray-500 mb-4">
                Suggested for you
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img alt="Suggested User 1" class="w-full h-full" height="40"
                                src="https://storage.googleapis.com/a1aa/image/fhW5M8CE6fjN1kfhGqesejpZn2mLq7MTSveoobeZgvuqIPNzJA.jpg"
                                width="40" />
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                reffy_lesmana
                            </div>
                            <div class="text-gray-500 text-sm">
                                Followed by reupi + 8 more
                            </div>
                        </div>
                    </div>
                    <a class="text-blue-500 font-bold" href="#">
                        Follow
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img alt="Suggested User 2" class="w-full h-full" height="40"
                                src="https://storage.googleapis.com/a1aa/image/qYQ7IWC76RIoBFyD9m0BzdhMQ6ZLby8MlbhVKuqumSEhnm5E.jpg"
                                width="40" />
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                reffy12
                            </div>
                            <div class="text-gray-500 text-sm">
                                Followed by reffy_official + 17 more
                            </div>
                        </div>
                    </div>
                    <a class="text-blue-500 font-bold" href="#">
                        Follow
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img alt="Suggested User 3" class="w-full h-full" height="40"
                                src="https://storage.googleapis.com/a1aa/image/3CH0lqn4jAKfT6js0LoI4xG70uPVJDdzIjvoXx0aZlRLPNzJA.jpg"
                                width="40" />
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                yffer
                            </div>
                            <div class="text-gray-500 text-sm">
                                Followed by twohand + 18 more
                            </div>
                        </div>
                    </div>
                    <a class="text-blue-500 font-bold" href="#">
                        Follow
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img alt="Suggested User 4" class="w-full h-full" height="40"
                                src="https://storage.googleapis.com/a1aa/image/nYXnPeQemyllD0VqFEyQKnaxNPLDyVNnsTWows7sXUHBe0MnA.jpg"
                                width="40" />
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                reffyyyyy
                            </div>
                            <div class="text-gray-500 text-sm">
                                Followed by ref + 12 more
                            </div>
                        </div>
                    </div>
                    <a class="text-blue-500 font-bold" href="#">
                        Follow
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img alt="Suggested User 5" class="w-full h-full" height="40"
                                src="https://storage.googleapis.com/a1aa/image/DzVJR6fW1aToCay5RX0d4S6I3f3A77rRHxTO59oxroFDe0MnA.jpg"
                                width="40" />
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                r433y
                            </div>
                            <div class="text-gray-500 text-sm">
                                Followed by r_f + 13 more
                            </div>
                        </div>
                    </div>
                    <a class="text-blue-500 font-bold" href="#">
                        Follow
                    </a>
                </div>
            </div>
            <div class="text-gray-500 text-sm mt-6">
                <div class="mt-4">
                    © 2024 MUHAMMAD REFFY LESMANA
                </div>
            </div>
        </div>
    </div>
</body>

</html>
