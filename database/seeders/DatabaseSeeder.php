<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'dapin{ternyata_setup_railway_agak_susah_hehe}',
        ])->forceFill(['is_admin' => true])->save();

        User::factory()->create([
            'name' => 'user',
            'email' => 'reader@test.com',
            'password' => 'password',
        ]);

        $brianKhrisna = Author::create(['name' => 'Brian Khrisna']);
        $PauloCoelho = Author::create(['name' => 'Paulo Coelho']);

        $gramedia = Publisher::create(['name' => 'Gramedia Widiasarana Indonesia']);
        $mediakita = Publisher::create(['name' => 'Publisher B']);

        Book::create([
            'title' => '23:59',
            'description' => 'Ami akhirnya bertunangan. Ia tersenyum di pelaminan, mengenakan kebaya putih, memamerkan cincin, dan dikelilingi teman-teman serta keluarga yang turut bahagia. Tapi, ada satu hal yang tidak hadir di hari besarnya: kebebasan dari masa lalunya. Di antara deretan bunga ucapan dan tawa para tamu, Athif—sahabat lelaki dari masa lalu Ami—hanya bisa diam menyaksikan pertunangan itu seperti menghadiri pemakaman. Karena ia tahu: di balik senyum Ami, masih ada luka yang belum selesai, pertanyaan yang belum terjawab, dan hati yang belum utuh. Ia tahu semuanya, karena ia tahu siapa Raga sebenarnya. Raga bukan sekadar mantan kekasih Ami. Ia adalah cinta pertama, cinta terdalam, dan luka paling tajam. Pria yang pergi tanpa penjelasan, memutuskan hubungan secara tiba-tiba ketika Ami masih mencintainya sepenuh hati. Semua orang membenci Raga—keluarga, teman, bahkan diri Ami sendiri. Namun, anehnya, di dalam hati Ami yang hancur, masih tersisa tanya: Kenapa ia pergi? Apa salahku? Aransyah datang seperti cahaya. Ia menunggu dengan sabar, mencintai dengan tulus, bahkan ketika tahu dirinya hanya menjadi tempat perlindungan sementara dari badai masa lalu Ami. Ia memperbaiki puing-puing yang bukan ia hancurkan. Ia bertahan, bahkan ketika Ami belum sepenuhnya kembali dari kehancuran. Di tengah semua itu, Athif berdiri di antara dua sisi: menjaga rahasia sahabatnya, atau membantu Ami mendapatkan ketenangan yang layak ia miliki. Karena ia tahu alasan mengapa Raga pergi, alasan yang tidak pernah diungkapkan, alasan yang mungkin bisa mengubah segalanya... atau justru menghancurkan ulang yang telah dibangun. 23:59 adalah sebuah kisah tentang luka yang tak sempat dijahit, cinta yang tak sempat selesai, dan keikhlasan yang dibayar mahal. Tentang perasaan yang tak bisa dibatalkan, dan tentang keputusan yang menunggu detik terakhir sebelum benar-benar dilepaskan.',    
            'price' => 80750,
            'release_date' => now()->subYear()->toDateString(),
            'author_id' => $BrianKhrisna->id,
            'publisher_id' => $gramedia->id,
        ]);
        
        Book::create([
            'title' => 'Seporsi Mie Ayam Sebelum Mati',
            'description' => 'Ale, seorang pria berusia 37 tahun memiliki tinggi badan 189 cm dan berat 138 kg. Badannya bongsor, berkulit hitam, dan memiliki masalah dengan bau badan. Sejak kecil, Ale hidup di lingkungan keluarga yang tidak mendukungnya. Ia tak memiliki teman dekat dan menjadi korban perundungan di sekolahnya.
                                Ale didiagnosis psikiaternya mengalami depresi akut. Bukannya Ale tidak peduli untuk memperbaiki dirinya sendiri, ia peduli. Ale telah berusaha mengatasi masalah-masalah yang timbul dari dirinya agar ia diterima di lingkungan pertemanan. Namun usahanya tidak pernah berhasil. Bahkan keluarganya pun tidak mendukungnya saat Ale membutuhkan sandaran dan dukungan.

                                Atas itu semua, Ale memutuskan untuk mati. Ia mempersiapkan kematiannya dengan baik. Agar ketika mati pun, Ale tidak banyak merepotkan orang. Dua puluh empat jam dari sekarang, ia akan menelan obat antidepresan yang dia punya sekaligus. Sebelum waktu itu tiba, Ale membersihkan apartemennya yang berantakan, makan makanan mahal yang tak pernah ia beli, pergi berkaraoke dan menyanyi sepuasnya hingga mabuk.

                                Saat 24 jam itu tiba, Ale telah bersiap dengan kemeja hitam dan celana hitam, bak baju melayat ke pemakamannya sendiri. Ia kenakan topi kecurut ulang tahun dan meletuskan konfeti yang ia beli untuk dirinya sendiri.
                                “Selamat ulang tahun yang terakhir, Ale.”

                                Ale siap menenggak seluruh obat antidepresan yang ia punya. Saat ia memain-mainkan botolnya, Ale terdiam saat membaca anjuran di kemasan botol itu, dikonsumsi sesudah makan. Seketika perutnya berbunyi. Dan Ale pun memutuskan untuk makan dulu sebelum mengakhiri hidupnya. Setidaknya, itu akan menjadi satu-satunya keputusan yang bisa dia ambil atas kehendaknya sendiri. Setelah selama hidupnya ia tak pernah mampu melakukan hal-hal yang ia inginkan.

                                Ale akan makan seporsi mie ayam sebelum mati.',    
            'price' => 74400,
            'release_date' => now()->subYear()->toDateString(),
            'author_id' => $BrianKhrisna->id,
            'publisher_id' => $gramedia->id,
        ]);

        Book::create([
            'title' => 'Bandung Menjelang Pagi',
            'description' => 'Menjelang pagi, Bandung berubah menjadi kota yang tak lagi sama. Malam terasa sangat panjang dan lebih mencekam dari kelam. Para bandit, pemadat, tukang judi, bocah geng motor, begundal grafiti, semuanya berkeliaran bak tikus-tikus ketika air got meluap.

                                Di kota ini, Dipha adalah bocah berandalan yang mampu mengerjakan apa saja. Berjualan bacang di Asia Afrika, pelayan kafe di Braga, buruh angkut kertas di Pajagalan, ataupun buruh kain di Tamin. Apa pun ia lakukan untuk bertahan hidup. Kemampuannya untuk mengerjakan apa saja itu membawanya bertemu dengan seorang gadis misterius bernama Vinda yang ngotot minta dicarikan tempat tinggal dengan segala syarat yang tak masuk akal.

                                Seperti dipermainkan oleh takdir, satu-satunya tempat yang tersedia adalah kontrakan petak yang terletak tepat di seberang kontrakan Dipha. Mau tidak mau, Vinda akhirnya menempati kontrakan itu.

                                Vinda yang sangat mencintai Bandung begitu bertolak belakang dengan Dipha yang sudah mengenal betapa bobroknya kota itu ketika menjelang pagi. Asia Afrika, Braga, Dago, Kalipah Apo, Astana Anyar, Banceuy, Jalan ABC, dan seluruh jalan-jalan tikus di Kota Bandung menjadi saksi tumbuhnya perasaan di antara keduanya.

                                Namun, sayangnya mereka berdua kerap lupa, bahwa sejatinya, oleh-oleh paling khas dari Kota Bandung adalah: patah hati.

                                *****
                                Untuk bertahan hidup di Bandung, Dipha bekerja serabutan. Apa pun akan ia kerjakan asalkan bisa mendapat uang untuk menyambung hidupnya sehari saja. Suatu siang, saat membawakan pesanan bacang untuk para petugas puskesmas, ia bertemu dengan seorang gadis misterius yang selalu memakai masker dan sarung tangan.

                                Selanjutnya, ia dimintai tolong untuk mencarikan sebuah kosan yang murah dan bersih untuk gadis itu. Lama berkeliling Kota Bandung, mereka tak kunjung menemukan kosan yang sesuai. Hingga akhirnya Dipha membawa gadis itu ke kontrakan yang berada berseberangan dengan kontrakan yang juga ditumpanginya. Dimulailah hari-hari Dipha bersama si gadis misterius yang bernama Vinda. Cerita keduanya pun bergulir.

                                Vinda begitu mencintai Kota Bandung sedangkan Dipha telah melihat kota itu dari segala sisinya, termasuk sisi gelap yang selama ini tidak terlihat melalui lensa kamera para wisatawan. Jalan Asia Afrika, Braga, Dago, jembatan layang Pasupati, menjadi saksi berkembangnya rasa di antara keduanya. Namun, rahasia yang keduanya simpan akan menentukan apakah kisah mereka akan berakhir bahagia, ataukah mereka akan mendapat oleh-oleh terbaik yang diberikan Kota Bandung: patah hati.

                                Bandung Menjelang Pagi menceritakan tentang sepasang manusia yang bertemu, memadu kasih, dan dipaksa untuk berpisah di Kota Bandung. Isinya sarat dengan kehidupan yang dijalani kelompok masyarakat yang kerap terlewatkan oleh penglihatan mata. Cerita yang penuh harap akan hidup yang Bahagia, tapi terpaksa menerima realitas, bahwa manusia boleh berencana, tapi tetap Tuhan yang menentukan takdir tiap hamba-Nya.

                                Keunggulan:
                                · Karya terbaru Brian Khrisna, yang sudah dikenal ciamik merangkai cerita berbumbu comedy romance.
                                · Di dalam buku ini, Brian Khrisna mengajak pembaca mengikuti kisah romansa sambil menjelajah spot-spot terkenal di Kota Bandung, seperti Jalan Asia Afrika, Jalan ABC, Dago, dan jembatan laying Pasupati.
                                · Di dalam buku ini juga, Brian Khrisna menuliskan sisi lain Kota Bandung dan penduduknya, yang mungkin selama ini tidak tertangkap kamera wisawatan.
                                · Brian Khrisna dengan sangat apik memadukan adegan-adegan dan dialog-dialog keseharian yang menggelitik, yang sudah menjadi ciri khas gaya penulisannya.
                                · Terdapat barcode playlist YouTube dan Spotify yang berisikan lagu-lagu yang disebutkan di dalam cerita.
                                · Terdapat ilustrasi tempat-tempat ikonik di Bandung di setiap awal bab.',    
            'price' => 95000,
            'release_date' => now()->subYear()->toDateString(),
            'author_id' => $BrianKhrisna->id,
            'publisher_id' => $mediakita->id,
        ]);
        
        Book::create([
            'title' => 'Second Book',
            'description' => 'A follow-up volume.',
            'price' => 14.50,
            'release_date' => now()->subMonths(6)->toDateString(),
            'author_id' => $author2->id,
            'publisher_id' => $pub2->id,
        ]);

        Book::create([
            'title' => 'Second Book',
            'description' => 'A follow-up volume.',
            'price' => 14.50,
            'release_date' => now()->subMonths(6)->toDateString(),
            'author_id' => $author2->id,
            'publisher_id' => $pub2->id,
        ]);
    }
}
