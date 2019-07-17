### [Ha-Ber] Haber CMS Scripti
**A�IKLAMA**: Scripti haber scripti olarak kodlad�m, ancak olabildi�ince dinamik kodlayarak ba�ka ama�larda da kullanabilmeniz i�in elimden geleni yapt�m. Sadece renklerle oynayarak kendinize �zg� t�m ama�larla kullanabilirsiniz.(renkleri CSS �zerinden de�i�tirmelisiniz.)
**Gereksinimler**: php destekleyen herhangi bir hosting ve domain. �zel bir framework kullan�lmam��t�r. Temiz PHP, Jquery, HTML kullan�lm��t�r.

#### [+] �zellikler
- Full Responsive, mobil cihazlarda otomatik boyutlan�yor (resimler dahil). Ayr�ca mobilde ger�ekten sitenin ��k durdu�unu belirtmek isterim.
- Men� ve Kategori sistemi. (panelden d�zenlenir.)
- Kategorilerde sayfalama sistemi vard�r.
- Men� ve Kategori sistemi ba��ms�z, men� adlar� kategorilerden ba��ms�z ayarlan�p ard�ndan men� istenen kategoriye ba�lanabiliyor.
- Bol Slider'li yap�.(haber sitelerinde en dikkat �eken ve kullan�c�y� tutan alanlar slider'lard�r.)
- Haz�r reklam alanlar�.(panelden d�zenlenebilir.)
- Ba�l�k ve i�erik k�saltma �zelli�i.
- %100 �zg�n 3 adet widget.(hava durumu, d�viz ve namaz saatleri). Al�nt� widget de�ildir, sadece bilgilerin �ekildi�i api uzak apidir. Tamamen scripte �zeldir.
- Sosyal medya butonlar� ve yasal belgeler sayfalar� vard�r.
- Yaz� yan� sidebar bulunur, reklam vard�r, farkl� bir �ey konmak istenirse kodlardan kolayl�kla d�zenlenebilir.
- Yaz� i�i Okunma Say�s� ve Emoji b�rakma �zellikleri script i�in �zel kodlanm��t�r. Al�nt� par�a de�ildir, do�ru ve d�zg�n �al���r.
- 5 Adet emoji b�rakma se�ene�i vard�r, kullan�c�lar yorum yapmaktansa tek t�kla emoji se�erek daha interaktif bir �ekilde oylamada bulunabilirler. G�z yormaz. Her kullan�c� her haber i�in yaln�zca 1 emoji b�rakabilir.
- Yaz� alt� benzer haberler b�l�m� vard�r, yaz�ya benzeyen i�erikleri bulup �eker(ger�ekten benzeyenleri bulur random de�ildir).
- Admin paneli vard�r.
- Panelde hangi alanda hangi kategoriden i�eriklerin d�nece�i, ka� tane i�eri�in d�nece�i se�ilebilir,
- Site ad�, a��klamas�, etiketleri, logosu d�zenlenebilir,
- Kategori eklenebilir, kategori silinebilir, kategori ad� de�i�tirilebilir,
- Men� eklenebilir, men�n�n ba�lant�s� de�i�tirilebilir, men� silinebilir,
- Haber(i�erik) eklenebilir, i�erik ekleme i�in �ekillendirilebilir WYS�WYG kuruludur, herhangi bir �demesi yoktur a��k kaynakt�r rahatl�kla kaliteli i�erikler yaz�labilir,
- Etiket sistemi vard�r,
- Sitede bulunan 3 adet reklam alan� panelden d�zenlenebilir, adsense vb. kodlar eklenebilir.
- Sosyal medya linkleri panelden d�zenlenebilir,
- Yasal belgelerin i�erikleri panelden d�zenlenebilir, yasal belgelerde ayr� bir de�i�iklik(isim, foto�raf vs.) yap�lmak istendi�inde �ok k���k bir kod bilgisiyle k�sa s�rede d�zenlenebilir.
- ��eriklerde ve ba�l�klarda kullanmak �zere URL gereklidir, resimleri siteye atmak i�in FTP ile u�ra�mamak i�in panelde foto y�kleme alan� bulunmaktad�r.

#### [-] Bilinen Eksiler

- Men�'ye a��r� men� butonu ekledi�inizde tasar�mda sat�r atlamaya yol a�abilirsiniz. 
- Hava durumu, namaz vakitleri ve d�viz apileri �cretsiz apilerdir, bu sebeple nadiren tekleme yapabilirler /�zellikle namaz vakitleri/ , �ok g�ze batmaz sayfa yenileyince ge�er. 
- �nternet explorer uyumlu de�ildir. (full responsive olmas�n�n getirdi�i bir dezavantaj, flexbox kullan�ld��� i�in explorer maalesef desteklemiyor. maalesef �n�ne ge�ebilece�im bir durum de�il.)

### NOTLAR ###
Bildi�im eksileri ve eksikleri yazd�m, g�z�mden ka�an yada benim sorun olarak g�rmedi�im ancak sizin ho�unuza gitmeyen k�s�mlar olabilir.
Script bir s�re daha elimin alt�nda olacak ve elimden geldi�ince daha fazla �zellik eklemeye, g�ncelleme getirmeye �al��aca��m. Bu s�re zarf�nda getirdi�im g�ncellemeleri bu repoda sunaca��m. Ancak herhangi bir g�ncelleme s�z� vermiyorum, dedi�im gibi, g�ncelleme getirebilirim, muhtemelen de getirece�im g�ncellemeler olacak (�rn. g�nl�k gazeteler k�sm� vs.) ama teminat�n� veremem. 

Kodlar a��k kaynakt�r,  be�enmedi�iniz, d�zenlemek istedi�iniz k�s�mlar� ufak kod bilgisiyle d�zenleyebilirsiniz. Birazr css, html, javascript bilgisiyle istedi�iniz d�zenlemeleri yapabilirsiniz siz de. Ancak scriptin tekrar sat��� yada d�zenlenip sat��� yasakt�r.

Scripti kurmak i�in bir belge de scriptin i�erisinde var.

###### // PAGESPEED INSIGHTS // 

Pagespeed insights 90 puan veriyor.

Ancak �unu belirtmek istiyorum, yine pagesp... 'da f�rsat k�sm�nda(d�zeltmenizi �nerdi�i �eyler k�sm�nda) Resimler hakk�nda uyar� veriyor, bu k�s�mda �unu dikkate alman�z� rica ediyorum. Ben demo sitesi olarak a�t���m i�in resimleri kendi sunucumda tutmad�m direk URL'leri arac�l���yla �ektim. Zaten paneli inceledi�inizde g�receksiniz, resim upload i�in k�s�m var. Siz resimleri kendi sunucunuzda bar�nd�rd���n�zda ve daha ak�lkar� boyutlarda resim ekledi�inizde bu 3 sat�rl�k gecikme de gidecektir. %50'den fazla h�z art��� olacakt�r. O y�zden altta g�rd���n�z uyar�n�n neden oldu�unu bilmenizi istedim.

## SCRIPT DEMO: [Script Demosu](https://bathremodel.info "Script Demosu")
## SCRIPT ADMIN PANEL DEMO:[ Admin Paneli Demosu](https://bathremodel.info/panel " Admin Paneli Demosu")
(K.ad�: admin - �ifre: admin)
-- Admin Paneli Demoda ��levsizdir --
