<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">

    <header class="w-full text-center p-6 bg-slate-800 border-b border-slate-700 flex justify-center gap-6">
        <a href="<?= base_url('/') ?>" class="hover:text-emerald-400 font-medium transition-colors">Halaman Utama</a>
        <a href="<?= base_url('home/profile') ?>" class="hover:text-emerald-400 font-medium transition-colors">Halaman Profil</a>
    </header>

    <main class="flex-1 flex items-center justify-center p-6">

        <div class="max-w-2xl w-full bg-slate-800/60 rounded-3xl p-8 border border-slate-700/50 shadow-2xl backdrop-blur-sm">            

            <div class="col-span-2 space-y-5">

                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-450 mb-1 ">Nama Lengkap</p>
                    <p class="text-xl font-extrabold text-white tracking-wide"><?= $identitas['name'] ?></p>
                </div>

                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-450 mb-1 w-60">Nomor Induk Mahasiswa </p>
                    <p class="text-base font-mono text-white font-semibold"><?= $identitas['nim']?></p>
                </div>

            </div>

        </div>

    </main>

</body>
</html>