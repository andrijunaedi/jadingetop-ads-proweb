<aside class="sticky top-0 flex flex-col w-[18.35%] h-screen bg-[#0047b3]">
    <div class="mx-auto mt-4">
        <div class="relative h-20 w-52 text-center text-white font-extrabold text-2xl flex items-center">
            <!-- <Image src="/static/images/logo-white.png" layout="fill" class="object-contain" /> -->
            Jadingetop Ads
        </div>
    </div>
    <ul class="mt-8 overflow-y-scroll no-scrollbar">
        <li class="px-8 py-4 <?= $active == "dashboard" ? 'bg-[#0065ff]' : '' ?> hover:bg-[#0065ff]">
            <a href="/dashboard">
                <div class="flex space-x-3 font-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span>Beranda</span>
                </div>
            </a>
        </li>
        <li class="px-8 py-4 <?= $active == "konten" ? 'bg-[#0065ff]' : '' ?> hover:bg-[#0065ff]">
            <a href="/konten">
                <div class="flex space-x-3 font-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span>Konten</span>
                </div>
            </a>
        </li>
        <li class="px-8 py-4 <?= $active == "billing" ? 'bg-[#0065ff]' : '' ?> hover:bg-[#0065ff]">
            <a href="/billing">
                <div class="flex space-x-3 font-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    <span>Tagihan</span>
                </div>
            </a>
        </li>
        <li class="px-8 py-4 <?= $active == "device" ? 'bg-[#0065ff]' : '' ?> <?= $role == 'mitra' ? '' : 'hidden' ?>  hover:bg-[#0065ff]">
            <a href="/device">
                <div class="flex space-x-3 font-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 002.25-2.25v-15a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 4.5v15a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <span>Perangkat</span>
                </div>
            </a>
        </li>
    </ul>
</aside>