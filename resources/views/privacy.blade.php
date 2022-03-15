<x-app-layout>
    <x-slot name="title">Ketentuan dan privasi</x-slot>
    <x-ui.radial class="fixed left-10 top-10 w-32 h-32"></x-ui.radial>
    <x-ui.radial class="fixed right-10 bottom-10 w-32 h-32"></x-ui.radial>
    <div
        class="px-3 min-h-screen min-w-screen flex flex-wrap justify-center items-center relative backdrop-filter backdrop-blur-3xl backdrop-sepia-0 bg-white/30 min-h-screen h-full w-full ">
        <div class="prose container mx-auto py-6">
            <h1>Ketentuan dan privasi</h1>
            <p>Last updated: March 13, 2022</p>
            <p>Kebijakan Privasi ini menjelaskan kebijakan dan prosedur Kami tentang pengumpulan, penggunaan, dan
                pengungkapan informasi Anda ketika Anda menggunakan Layanan dan memberi tahu Anda tentang hak privasi
                Anda dan bagaimana hukum melindungi Anda.
            </p>
            <p>Kami menggunakan data Pribadi Anda untuk menyediakan dan meningkatkan Layanan. Dengan menggunakan
                Layanan, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan Kebijakan Privasi ini.
                Kebijakan Privasi ini telah dibuat dengan bantuan dari <a
                    href="https://www.privacypolicies.com/blog/privacy-policy-template/" target="_blank">Privacy Policy
                    Template</a>.</p>
            <h1>Interpretasi dan Definisi</h1>
            <h2>Interpretasi</h2>
            <p>Kata-kata yang huruf awalnya dikapitalisasi memiliki arti yang ditentukan dalam kondisi berikut. Definisi
                berikut harus memiliki arti yang sama terlepas dari apakah mereka muncul dalam bentuk tunggal atau
                jamak.</p>
            <h2>Definisi</h2>
            <p>Untuk tujuan Kebijakan Privasi ini::</p>
            <ul>
                <li>
                    <p><strong>Akun</strong> berarti akun unik yang dibuat untuk Anda untuk mengakses Layanan kami atau
                        bagian dari Layanan kami.</p>
                </li>
                <li>
                    <p><strong>Afiliasi</strong>berarti suatu entitas yang mengendalikan, dikendalikan oleh, atau berada
                        di bawah pengendalian bersama dengan suatu pihak, di mana &quot;kontrol&quot; berarti
                        kepemilikan 50% atau lebih dari saham, kepentingan ekuitas atau surat berharga lainnya yang
                        berhak memberikan suara untuk pemilihan direktur atau otoritas pengelola lainnya.</p>
                </li>
                <li>
                    <p><strong>Aplikasi</strong> berarti program perangkat lunak yang disediakan oleh Perusahaan yang
                        diunduh oleh Anda pada perangkat elektronik apa pun,
                        bernama {{  config('setting.app_name.value') ?? config('app.name') }}</p>
                </li>
                <li>
                    <p><strong>Lembaga/Perusahaan</strong> (disebut sebagai &quot;Perusahaan&quot;, &quot;Kami&quot;
                        atau &quot;Kita&quot; dalam Perjanjian ini) mengacu
                        pada {{  config('setting.app_name.value') ?? config('app.name') }}.</p>
                </li>
                <li>
                    <p><strong>Cookies</strong> adalah file kecil yang ditempatkan di komputer Anda, perangkat seluler,
                        atau perangkat lain apa pun oleh situs web, yang berisi detail riwayat penelusuran Anda di situs
                        web itu di antara banyak kegunaannya.</p>
                </li>
                <li>
                    <p><strong>Negara</strong> mengacu pada: Indonesia</p>
                </li>
                <li>
                    <p><strong>Perangkat</strong> berarti perangkat apa pun yang dapat mengakses Layanan seperti
                        komputer, ponsel, atau tablet digital.</p>
                </li>
                <li>
                    <p><strong>Data Pribadi</strong> adalah setiap informasi yang berhubungan dengan individu yang
                        teridentifikasi atau dapat diidentifikasi.</p>
                </li>
                <li>
                    <p><strong>Layanan</strong> mengacu pada Aplikasi atau Situs Web atau keduanya.</p>
                </li>
                <li>
                    <p><strong>Penyedia layanan</strong> berarti setiap orang atau badan hukum yang memproses data atas
                        nama Perusahaan. Ini mengacu pada perusahaan atau individu pihak ketiga yang dipekerjakan oleh
                        Perusahaan untuk memfasilitasi Layanan, untuk menyediakan Layanan atas nama Perusahaan, untuk
                        melakukan layanan yang terkait dengan Layanan atau untuk membantu Perusahaan dalam menganalisis
                        bagaimana Layanan digunakan.</p>
                </li>
                <li>
                    <p><strong>Layanan Media Sosial pihak ketiga</strong> mengacu pada situs web atau situs web jejaring
                        sosial apa pun yang melaluinya Pengguna dapat masuk atau membuat akun untuk menggunakan Layanan.
                    </p>
                </li>
                <li>
                    <p><strong>Penggunaan Data</strong> mengacu pada data yang dikumpulkan secara otomatis, baik yang
                        dihasilkan oleh penggunaan Layanan atau dari infrastruktur Layanan itu sendiri (misalnya, durasi
                        kunjungan halaman).</p>
                </li>
                <li>
                    <p><strong>Website</strong> mengarah
                        kepada {{  config('setting.app_name.value') ?? config('app.name') }}, bisa diakses lewat <a
                            href="{{ url('/') }}" rel="external nofollow" target="_blank">{{ url('/') }}</a></p>
                </li>
                <li>
                    <p><strong>Anda</strong> berarti individu yang mengakses atau menggunakan Layanan, atau perusahaan,
                        atau badan hukum lainnya atas nama individu tersebut mengakses atau menggunakan Layanan,
                        sebagaimana berlaku.</p>
                </li>
            </ul>
            <h1>Mengumpulkan dan Menggunakan Data Pribadi Anda</h1>
            <h2>Jenis Data yang Dikumpulkan</h2>
            <h3>Data Pribadi</h3>
            <p>Saat menggunakan Layanan Kami, Kami dapat meminta Anda untuk memberikan Kami informasi pengenal pribadi
                tertentu yang dapat digunakan untuk menghubungi atau mengidentifikasi Anda. Informasi pengenal pribadi
                dapat mencakup, tetapi tidak terbatas pada:</p>
            <ul>
                <li>
                    <p>Alamat email</p>
                </li>
                <li>
                    <p>Nama pertama dan nama akhir</p>
                </li>
                <li>
                    <p>Nomor telepon</p>
                </li>
                <li>
                    <p>Alamat, Negara, Provinsi, ZIP/Kode pos, Kota</p>
                </li>
                <li>
                    <p>Penggunaan Data</p>
                </li>
            </ul>
            <h3>Penggunaan Data</h3>
            <p>Data Penggunaan dikumpulkan secara otomatis saat menggunakan Layanan.</p>
            <p>Data Penggunaan dapat mencakup informasi seperti alamat Protokol Internet Perangkat Anda (misalnya alamat
                IP), jenis browser, versi browser, halaman Layanan kami yang Anda kunjungi, waktu dan tanggal kunjungan
                Anda, waktu yang dihabiskan di halaman tersebut, unik pengenal perangkat dan data diagnostik
                lainnya.</p>
            <p>Saat Anda mengakses Layanan oleh atau melalui perangkat seluler, Kami dapat mengumpulkan informasi
                tertentu secara otomatis, termasuk, namun tidak terbatas pada, jenis perangkat seluler yang Anda
                gunakan, ID unik perangkat seluler Anda, alamat IP perangkat seluler Anda, perangkat seluler Anda sistem
                operasi, jenis peramban Internet seluler yang Anda gunakan, pengidentifikasi perangkat unik, dan data
                diagnostik lainnya.</p>
            <p>Kami juga dapat mengumpulkan informasi yang dikirimkan browser Anda setiap kali Anda mengunjungi Layanan
                kami atau ketika Anda mengakses Layanan dengan atau melalui perangkat seluler.</p>
            <h3>Informasi dari Layanan Media Sosial Pihak Ketiga</h3>
            <p>Perusahaan mengizinkan Anda untuk membuat akun dan masuk untuk menggunakan Layanan melalui Layanan Media
                Sosial Pihak Ketiga berikut:</p>
            <ul>
                <li>Google</li>
                <li>Facebook</li>
                <li>Twitter</li>
            </ul>
            <p>Jika Anda memutuskan untuk mendaftar melalui atau memberi kami akses ke Layanan Media Sosial Pihak
                Ketiga, Kami dapat mengumpulkan data Pribadi yang sudah dikaitkan dengan akun Layanan Media Sosial Pihak
                Ketiga Anda, seperti nama Anda, alamat email Anda , Aktivitas Anda atau daftar kontak Anda yang terkait
                dengan akun tersebut.</p>
            <p>Anda juga dapat memiliki opsi untuk berbagi informasi tambahan dengan Perusahaan melalui akun Layanan
                Media Sosial Pihak Ketiga Anda. Jika Anda memilih untuk memberikan informasi dan Data Pribadi tersebut,
                selama pendaftaran atau lainnya, Anda memberikan izin kepada Perusahaan untuk menggunakan, membagikan,
                dan menyimpannya dengan cara yang konsisten dengan Kebijakan Privasi ini.</p>
            <h3>Informasi yang Dikumpulkan saat Menggunakan Aplikasi</h3>
            <p>Saat menggunakan Aplikasi Kami, untuk menyediakan fitur Aplikasi Kami, Kami dapat mengumpulkan, dengan
                izin Anda sebelumnya:</p>
            <ul>
                <li>Informasi mengenai lokasi Anda</li>
                <li>Informasi dari buku telepon Perangkat Anda (daftar kontak)</li>
                <li>Gambar dan informasi lain dari kamera dan perpustakaan foto Perangkat Anda</li>
            </ul>
            <p>Kami menggunakan informasi ini untuk menyediakan fitur Layanan Kami, untuk meningkatkan dan menyesuaikan
                Layanan Kami. Informasi tersebut dapat diunggah ke server Perusahaan dan/atau server Penyedia Layanan
                atau mungkin hanya disimpan di perangkat Anda.</p>
            <p>Anda dapat mengaktifkan atau menonaktifkan akses ke informasi ini kapan saja, melalui setelan Perangkat
                Anda.</p>
            <h3>Teknologi Pelacakan dan Cookie</h3>
            <p>Kami menggunakan Cookie dan teknologi pelacakan serupa untuk melacak aktivitas di Layanan Kami dan
                menyimpan informasi tertentu. Teknologi pelacakan yang digunakan adalah beacon, tag, dan skrip untuk
                mengumpulkan dan melacak informasi serta untuk meningkatkan dan menganalisis Layanan Kami. Teknologi
                yang Kami gunakan dapat mencakup:</p>
            <ul>
                <li><strong>Cookie atau Cookie Browser.</strong> Cookie adalah file kecil yang ditempatkan di Perangkat
                    Anda. Anda dapat menginstruksikan browser Anda untuk menolak semua Cookie atau untuk menunjukkan
                    kapan Cookie sedang dikirim. Namun, jika Anda tidak menerima Cookie, Anda mungkin tidak dapat
                    menggunakan beberapa bagian dari Layanan kami. Kecuali Anda telah menyesuaikan pengaturan browser
                    Anda sehingga akan menolak Cookie, Layanan kami dapat menggunakan Cookie.
                </li>
                <li><strong>Web Beacon.</strong> Bagian tertentu dari Layanan kami dan email kami mungkin berisi file
                    elektronik kecil yang dikenal sebagai web beacon (juga disebut sebagai clear gif, tag piksel, dan
                    gif piksel tunggal) yang mengizinkan Perusahaan, misalnya, untuk menghitung pengguna yang telah
                    mengunjungi halaman tersebut atau membuka email dan untuk statistik situs web terkait lainnya
                    (misalnya, merekam popularitas bagian tertentu dan memverifikasi sistem dan integritas server).
                </li>
            </ul>
            <p>Cookie bisa menjadi &quot;Persisten&quot; atau &quot;Sesi&quot; Kue. Cookie Persisten tetap ada di
                komputer pribadi atau perangkat seluler Anda saat Anda offline, sementara Cookie Sesi dihapus segera
                setelah Anda menutup browser web Anda. Pelajari lebih lanjut tentang cookie: <a
                    href="https://www.privacypolicies.com/blog/privacy-policy-template/#Use_Of_Cookies_Log_Files_And_Tracking"
                    target="_blank">Cookies oleh PrivacyPolicies Generator</a>.</p>
            <p>Kami menggunakan Cookie Sesi dan Persistent untuk tujuan yang ditetapkan di bawah ini:</p>
            <ul>
                <li>
                    <p><strong>Cookie yang Diperlukan / Esensial</strong></p>
                    <p>Jenis: Cookie Sesi</p>
                    <p>Dikelola oleh: Kami</p>
                    <p>Tujuan: Cookies ini penting untuk menyediakan Anda dengan layanan yang tersedia melalui Situs Web
                        dan untuk memungkinkan Anda menggunakan beberapa fiturnya. Mereka membantu untuk mengotentikasi
                        pengguna dan mencegah penipuan penggunaan akun pengguna. Tanpa Cookie ini, layanan yang Anda
                        minta tidak dapat diberikan, dan Kami hanya menggunakan Cookie ini untuk menyediakan layanan
                        tersebut kepada Anda.</p>
                </li>
                <li>
                    <p><strong>Kebijakan Cookie / Cookie Penerimaan Pemberitahuan</strong></p>
                    <p>Jenis: Cookie Persisten</p>
                    <p>Dikelola oleh: Kami</p>
                    <p>Tujuan: Cookie ini mengidentifikasi apakah pengguna telah menerima penggunaan cookie di Situs
                        Web.</p>
                </li>
                <li>
                    <p><strong>Cookie Fungsionalitas</strong></p>
                    <p>Jenis: Cookie Persisten</p>
                    <p>Dikelola oleh: Kami</p>
                    <p>Tujuan: Cookies ini memungkinkan kami untuk mengingat pilihan yang Anda buat saat Anda
                        menggunakan Situs Web, seperti mengingat detail login atau preferensi bahasa Anda. Tujuan dari
                        Cookie ini adalah untuk memberi Anda pengalaman yang lebih pribadi dan untuk menghindari Anda
                        harus memasukkan kembali preferensi Anda setiap kali Anda menggunakan Situs Web.</p>
                </li>
            </ul>
            <p>Untuk informasi lebih lanjut tentang cookie yang kami gunakan dan pilihan Anda terkait cookie, silakan
                kunjungi Kebijakan Cookie kami atau bagian Cookie dari Kebijakan Privasi kami.</p>
            <h2>Penggunaan Data Pribadi Anda</h2>
            <p>Perusahaan dapat menggunakan Data Pribadi untuk tujuan berikut:</p>
            <ul>
                <li>
                    <p><strong>Untuk menyediakan dan memelihara Layanan kami</strong>, termasuk untuk memantau
                        penggunaan Layanan kami.</p>
                </li>
                <li>
                    <p><strong>Untuk mengelola Akun Anda:</strong> untuk mengelola pendaftaran Anda sebagai pengguna
                        Layanan. Data Pribadi yang Anda berikan dapat memberi Anda akses ke berbagai fungsi Layanan yang
                        tersedia untuk Anda sebagai pengguna terdaftar.</p>
                </li>
                <li>
                    <p><strong>Untuk pelaksanaan kontrak:</strong> pengembangan, kepatuhan, dan pelaksanaan kontrak
                        pembelian untuk produk, item, atau layanan yang telah Anda beli atau kontrak lainnya dengan Kami
                        melalui Layanan.</ p>
                </li>
                <li>
                    <p><strong>Untuk menghubungi Anda:</strong> Untuk menghubungi Anda melalui email, panggilan telepon,
                        SMS, atau bentuk komunikasi elektronik lain yang setara, seperti
                        pemberitahuan push aplikasi seluler mengenai pembaruan atau komunikasi informatif yang terkait
                        dengan fungsi, produk, atau layanan yang dikontrak, termasuk pembaruan keamanan, bila perlu atau
                        wajar untuk penerapannya.</p>
                </li>
                <li>
                    <p><strong>Untuk memberi Anda</strong> berita, penawaran khusus, dan informasi umum tentang barang,
                        layanan, dan acara lain yang kami tawarkan yang serupa dengan yang telah Anda beli atau tanyakan
                        kecuali Anda memilih untuk tidak menerima informasi tersebut.</p>
                </li>
                <li>
                    <p><strong>Untuk mengelola permintaan Anda:</strong> Untuk menghadiri dan mengelola permintaan Anda
                        kepada Kami.</p>
                </li>
                <li>
                    <p><strong>Untuk transfer bisnis:</strong> Kami dapat menggunakan informasi Anda untuk mengevaluasi
                        atau melakukan merger, divestasi, restrukturisasi, reorganisasi, pembubaran, atau penjualan atau
                        pengalihan lainnya dari sebagian atau seluruh aset Kami, baik sebagai kelangsungan usaha atau
                        sebagai bagian dari kebangkrutan, likuidasi, atau proses serupa, di mana Data Pribadi yang Kami
                        simpan tentang pengguna Layanan kami termasuk di antara aset yang dialihkan.</p>
                </li>
                <li>
                    <p><strong>Untuk tujuan lain</strong>: Kami dapat menggunakan informasi Anda untuk tujuan lain,
                        seperti analisis data, mengidentifikasi tren penggunaan, menentukan efektivitas kampanye promosi
                        kami, dan untuk mengevaluasi serta meningkatkan Layanan, produk, layanan kami , pemasaran, dan
                        pengalaman Anda.</p>
                </li>
            </ul>
            <p>Kami dapat membagikan informasi pribadi Anda dalam situasi berikut:</p>
            <ul>
                <li><strong>Dengan Penyedia Layanan:</strong> Kami dapat membagikan informasi pribadi Anda dengan
                    Penyedia Layanan untuk memantau dan menganalisis penggunaan Layanan kami, untuk menghubungi Anda.
                </li>
                <li><strong>Untuk transfer bisnis:</strong> Kami dapat membagikan atau mentransfer informasi pribadi
                    Anda sehubungan dengan, atau selama negosiasi, merger, penjualan aset Perusahaan, pembiayaan, atau
                    akuisisi semua atau sebagian dari bisnis ke perusahaan lain.
                </li>
                <li><strong>Dengan Afiliasi:</strong> Kami dapat membagikan informasi Anda dengan afiliasi Kami, dalam
                    hal ini kami akan mewajibkan afiliasi tersebut untuk mematuhi Kebijakan Privasi ini. Afiliasi
                    termasuk perusahaan induk Kami dan anak perusahaan lainnya, mitra usaha patungan, atau perusahaan
                    lain yang Kami kendalikan atau yang berada di bawah kendali yang sama dengan Kami.
                </li>
                <li><strong>Dengan mitra bisnis:</strong> Kami dapat membagikan informasi Anda dengan mitra bisnis Kami
                    untuk menawarkan produk, layanan, atau promosi tertentu kepada Anda.
                </li>
                <li><strong>Dengan pengguna lain:</strong> ketika Anda berbagi informasi pribadi atau berinteraksi di
                    area publik dengan pengguna lain, informasi tersebut dapat dilihat oleh semua pengguna dan dapat
                    didistribusikan secara publik di luar. Jika Anda berinteraksi dengan pengguna lain atau mendaftar
                    melalui Layanan Media Sosial Pihak Ketiga, kontak Anda di Layanan Media Sosial Pihak Ketiga dapat
                    melihat nama, profil, gambar, dan deskripsi aktivitas Anda. Demikian pula, pengguna lain akan dapat
                    melihat deskripsi aktivitas Anda, berkomunikasi dengan Anda, dan melihat profil Anda.
                </li>
                <li><strong>Dengan persetujuan Anda</strong>: Kami dapat mengungkapkan informasi pribadi Anda untuk
                    tujuan lain apa pun dengan persetujuan Anda.
                </li>
            </ul>
            <h2>Retensi Data Pribadi Anda</h2>
            <p>Perusahaan akan menyimpan Data Pribadi Anda hanya selama diperlukan untuk tujuan yang ditetapkan dalam
                Kebijakan Privasi ini. Kami akan menyimpan dan menggunakan Data Pribadi Anda sejauh yang diperlukan
                untuk mematuhi kewajiban hukum kami (misalnya, jika kami diharuskan menyimpan data Anda untuk mematuhi
                hukum yang berlaku), menyelesaikan perselisihan, dan menegakkan perjanjian dan kebijakan hukum kami.</
            p>
            <p>Perusahaan juga akan menyimpan Data Penggunaan untuk tujuan analisis internal. Data Penggunaan umumnya
                disimpan untuk jangka waktu yang lebih singkat, kecuali jika data ini digunakan untuk memperkuat
                keamanan atau untuk meningkatkan fungsionalitas Layanan Kami, atau Kami secara hukum berkewajiban untuk
                menyimpan data ini untuk jangka waktu yang lebih lama.</p>
            <h2>Transfer Data Pribadi Anda</h2>
            <p>Informasi Anda, termasuk Data Pribadi, diproses di kantor operasional Perusahaan dan di tempat lain di
                mana pihak-pihak yang terlibat dalam pemrosesan berada. Ini berarti bahwa informasi ini dapat ditransfer
                ke — dan dipelihara di — komputer yang terletak di luar negara bagian Anda, provinsi, negara atau
                yurisdiksi pemerintah lainnya di mana undang-undang perlindungan data mungkin berbeda dari yurisdiksi
                Anda.</p>
            <p>Persetujuan Anda terhadap Kebijakan Privasi ini diikuti dengan penyerahan Anda atas informasi tersebut
                menunjukkan persetujuan Anda atas transfer tersebut.</p>
            <p>Perusahaan akan mengambil semua langkah yang diperlukan secara wajar untuk memastikan bahwa data Anda
                diperlakukan dengan aman dan sesuai dengan tKebijakan Privasinya dan transfer Data Pribadi Anda tidak
                akan dilakukan ke organisasi atau negara kecuali ada kontrol yang memadai termasuk keamanan data Anda
                dan informasi pribadi lainnya.</p>
            <h2>Pengungkapan Data Pribadi Anda</h2>
            <h3>Transaksi Bisnis</h3>
            <p>Jika Perusahaan terlibat dalam merger, akuisisi, atau penjualan aset, Data Pribadi Anda dapat dialihkan.
                Kami akan memberikan pemberitahuan sebelum Data Pribadi Anda ditransfer dan tunduk pada Kebijakan
                Privasi yang berbeda.</p>
            <h3>Penegakan hukum</h3>
            <p>Dalam keadaan tertentu, Perusahaan mungkin diminta untuk mengungkapkan Data Pribadi Anda jika diwajibkan
                oleh hukum atau sebagai tanggapan atas permintaan yang sah oleh otoritas publik (misalnya pengadilan
                atau lembaga pemerintah).</p>
            <h3>Persyaratan hukum lainnya</h3>
            <p>Perusahaan dapat mengungkapkan Data Pribadi Anda dengan itikad baik dengan keyakinan bahwa tindakan
                tersebut diperlukan untuk:</p>
            <ul>
                <li>Mematuhi kewajiban hukum</li>
                <li>Melindungi dan membela hak atau properti Perusahaan</li>
                <li>Mencegah atau menyelidiki kemungkinan kesalahan sehubungan dengan Layanan</li>
                <li>Lindungi keamanan pribadi Pengguna Layanan atau publik</li>
                <li>Melindungi dari tanggung jawab hukum</li>
            </ul>
            <h2>Keamanan Data Pribadi Anda</h2>
            <p>Keamanan Data Pribadi Anda penting bagi Kami, tetapi ingat bahwa tidak ada metode transmisi melalui
                Internet, atau metode penyimpanan elektronik yang 100% aman. Meskipun Kami berusaha untuk menggunakan
                cara yang dapat diterima secara komersial untuk melindungi Data Pribadi Anda, Kami tidak dapat menjamin
                keamanan mutlaknya.</p>
            <h1>Privasi Anak</h1>
            <p>Layanan kami tidak ditujukan kepada siapa pun yang berusia di bawah 13 tahun. Kami tidak dengan sengaja
                mengumpulkan informasi pengenal pribadi dari siapa pun yang berusia di bawah 13 tahun. Jika Anda adalah
                orang tua atau wali dan Anda mengetahui bahwa anak Anda telah memberikan Informasi Pribadi kepada Kami
                Data, silahkan hubungi Kami. Jika Kami mengetahui bahwa Kami telah mengumpulkan Data Pribadi dari siapa
                pun yang berusia di bawah 13 tahun tanpa verifikasi persetujuan orang tua, Kami mengambil
                langkah-langkah untuk menghapus informasi tersebut dari server Kami.</p>
            <p>Jika Kami perlu mengandalkan persetujuan sebagai dasar hukum untuk memproses informasi Anda dan negara
                Anda memerlukan persetujuan dari orang tua, Kami mungkin memerlukan persetujuan orang tua Anda sebelum
                Kami mengumpulkan dan menggunakan informasi tersebut.</p>
            <h1>Tautan ke Situs Web Lain</h1>
            <p>Layanan Kami mungkin berisi tautan ke situs web lain yang tidak dioperasikan oleh Kami. Jika Anda
                mengklik tautan pihak ketiga, Anda akan diarahkan ke situs pihak ketiga tersebut. Kami sangat
                menyarankan Anda untuk meninjau Kebijakan Privasi setiap situs yang Anda kunjungi.</p>
            <p>Kami tidak memiliki kendali atas dan tidak bertanggung jawab atas konten, kebijakan privasi, atau praktik
                situs atau layanan pihak ketiga mana pun.</p>
            <h1>Perubahan pada Kebijakan Privasi ini</h1>
            <p>Kami dapat memperbarui Kebijakan Privasi Kami dari waktu ke waktu. Kami akan memberi tahu Anda tentang
                perubahan apa pun dengan memposting Kebijakan Privasi baru di halaman ini.</p>
            <p>Kami akan memberi tahu Anda melalui email dan/atau pemberitahuan penting di Layanan Kami, sebelum
                perubahan menjadi efektif dan memperbarui &quot;Terakhir diperbarui&quot; tanggal di bagian atas
                Kebijakan Privasi ini.</p>
            <p>Anda disarankan untuk meninjau Kebijakan Privasi ini secara berkala untuk setiap perubahan. Perubahan
                pada Kebijakan Privasi ini berlaku efektif saat diposting di halaman ini.</p>
            <h1>Hubungi Kami</h1>
            <p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, Anda dapat menghubungi kami:</p>
            <ul>
                <li>Melalui email: {{ config('setting.app_email.value') ?? config('app.email') }}</li>
            </ul>
        </div>
    </div>

</x-app-layout>
