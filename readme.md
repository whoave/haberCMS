### [Ha-Ber] Haber CMS Scripti
**AÇIKLAMA**: Scripti haber scripti olarak kodladým, ancak olabildiðince dinamik kodlayarak baþka amaçlarda da kullanabilmeniz için elimden geleni yaptým. Sadece renklerle oynayarak kendinize özgü tüm amaçlarla kullanabilirsiniz.(renkleri CSS üzerinden deðiþtirmelisiniz.)
**Gereksinimler**: php destekleyen herhangi bir hosting ve domain. Özel bir framework kullanýlmamýþtýr. Temiz PHP, Jquery, HTML kullanýlmýþtýr.

#### [+] Özellikler
- Full Responsive, mobil cihazlarda otomatik boyutlanýyor (resimler dahil). Ayrýca mobilde gerçekten sitenin þýk durduðunu belirtmek isterim.
- Menü ve Kategori sistemi. (panelden düzenlenir.)
- Kategorilerde sayfalama sistemi vardýr.
- Menü ve Kategori sistemi baðýmsýz, menü adlarý kategorilerden baðýmsýz ayarlanýp ardýndan menü istenen kategoriye baðlanabiliyor.
- Bol Slider'li yapý.(haber sitelerinde en dikkat çeken ve kullanýcýyý tutan alanlar slider'lardýr.)
- Hazýr reklam alanlarý.(panelden düzenlenebilir.)
- Baþlýk ve içerik kýsaltma özelliði.
- %100 özgün 3 adet widget.(hava durumu, döviz ve namaz saatleri). Alýntý widget deðildir, sadece bilgilerin çekildiði api uzak apidir. Tamamen scripte özeldir.
- Sosyal medya butonlarý ve yasal belgeler sayfalarý vardýr.
- Yazý yaný sidebar bulunur, reklam vardýr, farklý bir þey konmak istenirse kodlardan kolaylýkla düzenlenebilir.
- Yazý içi Okunma Sayýsý ve Emoji býrakma özellikleri script için özel kodlanmýþtýr. Alýntý parça deðildir, doðru ve düzgün çalýþýr.
- 5 Adet emoji býrakma seçeneði vardýr, kullanýcýlar yorum yapmaktansa tek týkla emoji seçerek daha interaktif bir þekilde oylamada bulunabilirler. Göz yormaz. Her kullanýcý her haber için yalnýzca 1 emoji býrakabilir.
- Yazý altý benzer haberler bölümü vardýr, yazýya benzeyen içerikleri bulup çeker(gerçekten benzeyenleri bulur random deðildir).
- Admin paneli vardýr.
- Panelde hangi alanda hangi kategoriden içeriklerin döneceði, kaç tane içeriðin döneceði seçilebilir,
- Site adý, açýklamasý, etiketleri, logosu düzenlenebilir,
- Kategori eklenebilir, kategori silinebilir, kategori adý deðiþtirilebilir,
- Menü eklenebilir, menünün baðlantýsý deðiþtirilebilir, menü silinebilir,
- Haber(içerik) eklenebilir, içerik ekleme için þekillendirilebilir WYSÝWYG kuruludur, herhangi bir ödemesi yoktur açýk kaynaktýr rahatlýkla kaliteli içerikler yazýlabilir,
- Etiket sistemi vardýr,
- Sitede bulunan 3 adet reklam alaný panelden düzenlenebilir, adsense vb. kodlar eklenebilir.
- Sosyal medya linkleri panelden düzenlenebilir,
- Yasal belgelerin içerikleri panelden düzenlenebilir, yasal belgelerde ayrý bir deðiþiklik(isim, fotoðraf vs.) yapýlmak istendiðinde çok küçük bir kod bilgisiyle kýsa sürede düzenlenebilir.
- Ýçeriklerde ve baþlýklarda kullanmak üzere URL gereklidir, resimleri siteye atmak için FTP ile uðraþmamak için panelde foto yükleme alaný bulunmaktadýr.

#### [-] Bilinen Eksiler

- Menü'ye aþýrý menü butonu eklediðinizde tasarýmda satýr atlamaya yol açabilirsiniz. 
- Hava durumu, namaz vakitleri ve döviz apileri ücretsiz apilerdir, bu sebeple nadiren tekleme yapabilirler /özellikle namaz vakitleri/ , çok göze batmaz sayfa yenileyince geçer. 
- Ýnternet explorer uyumlu deðildir. (full responsive olmasýnýn getirdiði bir dezavantaj, flexbox kullanýldýðý için explorer maalesef desteklemiyor. maalesef önüne geçebileceðim bir durum deðil.)

### NOTLAR ###
Bildiðim eksileri ve eksikleri yazdým, gözümden kaçan yada benim sorun olarak görmediðim ancak sizin hoþunuza gitmeyen kýsýmlar olabilir.
Script bir süre daha elimin altýnda olacak ve elimden geldiðince daha fazla özellik eklemeye, güncelleme getirmeye çalýþacaðým. Bu süre zarfýnda getirdiðim güncellemeleri bu repoda sunacaðým. Ancak herhangi bir güncelleme sözü vermiyorum, dediðim gibi, güncelleme getirebilirim, muhtemelen de getireceðim güncellemeler olacak (örn. günlük gazeteler kýsmý vs.) ama teminatýný veremem. 

Kodlar açýk kaynaktýr,  beðenmediðiniz, düzenlemek istediðiniz kýsýmlarý ufak kod bilgisiyle düzenleyebilirsiniz. Birazr css, html, javascript bilgisiyle istediðiniz düzenlemeleri yapabilirsiniz siz de. Ancak scriptin tekrar satýþý yada düzenlenip satýþý yasaktýr.

Scripti kurmak için bir belge de scriptin içerisinde var.

###### // PAGESPEED INSIGHTS // 

Pagespeed insights 90 puan veriyor.

Ancak þunu belirtmek istiyorum, yine pagesp... 'da fýrsat kýsmýnda(düzeltmenizi önerdiði þeyler kýsmýnda) Resimler hakkýnda uyarý veriyor, bu kýsýmda þunu dikkate almanýzý rica ediyorum. Ben demo sitesi olarak açtýðým için resimleri kendi sunucumda tutmadým direk URL'leri aracýlýðýyla çektim. Zaten paneli incelediðinizde göreceksiniz, resim upload için kýsým var. Siz resimleri kendi sunucunuzda barýndýrdýðýnýzda ve daha akýlkarý boyutlarda resim eklediðinizde bu 3 satýrlýk gecikme de gidecektir. %50'den fazla hýz artýþý olacaktýr. O yüzden altta gördüðünüz uyarýnýn neden olduðunu bilmenizi istedim.

## SCRIPT DEMO: [Script Demosu](https://bathremodel.info "Script Demosu")
## SCRIPT ADMIN PANEL DEMO:[ Admin Paneli Demosu](https://bathremodel.info/panel " Admin Paneli Demosu")
(K.adý: admin - Þifre: admin)
-- Admin Paneli Demoda Ýþlevsizdir --
