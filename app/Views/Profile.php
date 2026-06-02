<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen flex flex-col font-sans">

    <header class="w-full text-center p-6 bg-slate-800 border-b border-slate-700 flex justify-center gap-6">
        <a href="<?= base_url('/') ?>" class="hover:text-emerald-400 font-medium transition-colors">Halaman Utama</a>
        <a href="<?= base_url('home/profile') ?>" class="hover:text-emerald-400 font-medium transition-colors">Halaman Profil</a>
    </header>

    <main class="flex-1 flex items-center justify-center p-6">
        
        <div class="max-w-2xl w-full bg-slate-800/60 rounded-3xl p-8 border border-slate-700/50 shadow-2xl backdrop-blur-sm">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">  

                <div class="col-span-1 border-b md:border-b-0 md:border-r border-slate-700/60 pb-6 md:pb-0 md:pr-8">
                    <img src="<?= base_url($identitas['image']) ?>">
                </div>

                <div class="col-span-2 space-y-5">

                    <div>
                        <h2 class="text-xs font-bold uppercase text-emerald-500 tracking-widest text-slate-450 mb-1">Nama Lengkap</h2>
                        <p class="text-xl font-extrabold text-white tracking-wide"><?= $identitas['name'] ?></p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h2 class="text-xs font-bold uppercase text-emerald-500 tracking-widest text-slate-450 mb-1">NIM</h2>
                            <p class="text-base font-mono text-white font-semibold"><?= $identitas['nim'] ?></p>
                        </div>
                        
                        <div>
                            <h2 class="text-xs font-bold uppercase text-emerald-500 tracking-widest text-slate-450 mb-1">Asal Prodi</h2>
                            <p class="text-sm font-medium text-slate-200"><?= $identitas['prodi'] ?></p>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-700/40">
                        <h2 class="text-xs font-bold uppercase text-emerald-500 tracking-widest text-slate-450 mb-1.5">Hobi</h2>
                        <p class="text-sm text-white leading-relaxed"><?= $identitas['hobby'] ?></p>
                    </div>
                    
                    <div class="pt-2 border-t border-slate-700/40">
                            <h2 class="text-xs font-bold uppercase text-emerald-500 tracking-widest text-slate-450 mb-1.5">skill</h2>
                            <p class="text-sm text-white leading-relaxed"><?= $identitas['skill'] ?></p>
                    </div>

                </div>

            </div> 

        </div> 

    </main>
    
</body>
</html>