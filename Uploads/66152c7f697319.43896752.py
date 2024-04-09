client
dev tun
proto udp
remote edge-eu-starting-point-1-dhcp.hackthebox.eu 1337
resolv-retry infinite
nobind
persist-key
persist-tun
remote-cert-tls server
comp-lzo
verb 3
cipher AES-128-CBC
tls-cipher "DEFAULT:@SECLEVEL=0"
auth SHA256
key-direction 1
<ca>
-----BEGIN CERTIFICATE-----
MIIDSDCCAjCgAwIBAgIUQShMroYO95avGUV+HFvOEghuMv8wDQYJKoZIhvcNAQEL
BQAwFTETMBEGA1UEAwwKSGFja1RoZUJveDAeFw0yMTEwMjExMTA1NDdaFw0zMTEw
MTkxMTA1NDdaMBUxEzARBgNVBAMMCkhhY2tUaGVCb3gwggEiMA0GCSqGSIb3DQEB
AQUAA4IBDwAwggEKAoIBAQCedIbjiIrL7EgTpvrMCfdYr7lDs5+x3bg4E5m/ucTw
MCztOmf+VKj+zocWviyR6N5jR5L2nUoLi3vz2+/Ic6zZHmvHl9kVsAg+qFQ3DHtL
rKrKc8k6G9DMhNaeJLfADEUZCMBpKpjB1EvdK7uTpx7u2q0sT9uzDYCTxHZvAna0
Ek0YCNo3mh7UoWCiSIxF7/h8xcgUmL4bXNLoEka6xHtYPnIYxakzwDzlhB9Ldgyt
u2z34QJ3uWtT/2E/JY4X964cnXmhtdCpppZ5us6CrslzUJyihNI7YefgW6VKAoQ6
cJ+vgoqwyu132p1DyTqMii6eBG82P7Rp2+yj1gYZeA4RAgMBAAGjgY8wgYwwHQYD
VR0OBBYEFBqDv0nbZS6Iru4cukfsXB8yF3h8MFAGA1UdIwRJMEeAFBqDv0nbZS6I
ru4cukfsXB8yF3h8oRmkFzAVMRMwEQYDVQQDDApIYWNrVGhlQm94ghRBKEyuhg73
lq8ZRX4cW84SCG4y/zAMBgNVHRMEBTADAQH/MAsGA1UdDwQEAwIBBjANBgkqhkiG
9w0BAQsFAAOCAQEAB1LXupSk4WctIuudC4yCwEgvjNTmwH6j129XUT3miWNwvqg4
I9Hq5hjlbVkeAV0kN37BJu9ORc9eInviFvVPq80WTxWYj6lmfsqHsfgeabEwtlzL
lviuXjPdB02hsGHk7CaUcfZ+GkkDGM0YwAJnY66atlDfQNIevz2DZzetQr/cdGmK
wFIHlXJl3lzAJL5gVKraLhXulO4ZnEGHH1l999a/G1qFU2x8tvpJ1uS+mIrEJE8v
QIyy8gGSt3+L9bcIKguiGUQEaE88w5p9kFkzNuig5rpGeA0C8sAC8+QAlLTykd3Q
q5QVkoKu0HRdwQcmPlVcD1+512IvwJDDtl9FDA==
-----END CERTIFICATE-----
</ca>
<cert>
Certificate:
    Data:
        Version: 3 (0x2)
        Serial Number:
            59:2c:33:e4:28:8c:bc:53:ea:ad:25:56:50:3a:30:97
        Signature Algorithm: sha256WithRSAEncryption
        Issuer: CN=HackTheBox
        Validity
            Not Before: Jun 21 17:54:30 2022 GMT
            Not After : Jun  5 17:54:30 2025 GMT
        Subject: CN=Godefroy29
        Subject Public Key Info:
            Public Key Algorithm: rsaEncryption
                RSA Public-Key: (2048 bit)
                Modulus:
                    00:bd:10:c5:e7:3e:d5:f1:23:f6:2f:ca:70:3e:a3:
                    61:2f:84:83:bc:e1:49:d2:ae:65:78:f7:94:f6:5c:
                    d4:f0:da:0b:f7:44:75:77:45:29:7f:c1:fa:8d:dc:
                    1e:88:d4:a5:b7:89:c7:66:6c:4b:27:1f:9d:45:1c:
                    7f:6f:18:76:9d:08:16:52:2f:32:49:6b:d0:a5:6a:
                    da:a9:94:6c:6b:0b:5f:e9:45:35:36:bb:fc:90:33:
                    bf:69:38:95:5f:4f:a2:8d:f6:fa:2a:d6:20:c5:36:
                    d2:f2:30:b2:ac:99:dc:eb:d8:58:e7:4b:39:7b:6a:
                    ff:31:15:cc:9a:c3:d0:ba:8b:59:ea:3a:9a:f7:36:
                    90:8e:d1:c4:9b:73:68:a5:3d:30:00:52:af:6b:e1:
                    e5:58:97:f3:1d:18:9a:06:04:9b:3c:88:b6:95:1b:
                    e0:4c:59:13:b5:64:d5:a0:26:ac:6f:72:a4:0a:06:
                    8f:f7:fb:c4:57:c1:54:31:8b:39:60:93:94:7c:df:
                    13:5b:83:2d:ed:b1:85:7a:80:fc:7d:d7:9a:86:4d:
                    cc:a5:f5:5b:52:a8:dd:5e:7a:d4:84:ed:a8:a1:d3:
                    66:95:6f:d4:11:7e:13:1e:0d:12:3c:c2:c2:9e:49:
                    27:f4:64:86:99:b4:54:33:a2:c5:47:53:54:d1:84:
                    b7:f9
                Exponent: 65537 (0x10001)
        X509v3 extensions:
            X509v3 Basic Constraints: 
                CA:FALSE
            X509v3 Subject Key Identifier: 
                5C:8C:DA:A8:89:44:06:7F:77:E9:01:2D:A7:E7:D1:AD:11:10:69:32
            X509v3 Authority Key Identifier: 
                keyid:1A:83:BF:49:DB:65:2E:88:AE:EE:1C:BA:47:EC:5C:1F:32:17:78:7C
                DirName:/CN=HackTheBox
                serial:41:28:4C:AE:86:0E:F7:96:AF:19:45:7E:1C:5B:CE:12:08:6E:32:FF

            X509v3 Extended Key Usage: 
                TLS Web Client Authentication
            X509v3 Key Usage: 
                Digital Signature
    Signature Algorithm: sha256WithRSAEncryption
         6b:cc:47:1f:67:b8:ac:cf:72:fd:e0:86:9d:c2:5f:d7:70:5c:
         10:2a:90:17:06:76:c9:b5:45:d1:87:e9:cc:99:49:91:5b:48:
         99:1f:bf:6a:ee:75:3e:47:b7:9f:90:a6:27:2e:6e:b9:c1:53:
         cc:f0:9d:9a:57:f8:9e:0a:c4:16:fe:cd:22:1e:63:f9:dc:54:
         60:d7:15:3e:ec:34:a2:9e:fb:ed:99:26:6e:2b:4f:21:d8:80:
         90:66:e7:1a:37:56:29:03:8a:51:ab:6a:24:2f:c9:b1:26:fa:
         7c:84:cf:51:ce:ad:e6:0c:2e:8c:b6:40:7b:ba:70:f9:9f:4e:
         9f:0f:fd:2b:90:cb:8a:46:18:a7:8e:33:5b:39:26:a4:06:2c:
         9e:c4:fe:8b:54:0f:9c:23:da:88:26:ab:2e:53:42:3c:fc:64:
         63:f6:ca:6c:d0:f6:2a:53:43:77:77:cb:09:48:53:07:08:f2:
         6a:7d:c4:e9:d4:cd:0b:ab:c5:86:e0:74:53:f3:50:7b:38:d5:
         c3:ef:00:ca:9d:0d:f6:ef:5d:91:51:b7:87:af:4d:6f:cc:c2:
         8e:d9:a6:ed:e6:71:24:f0:7c:d2:ca:82:8f:4b:5c:66:d0:b1:
         de:e6:ba:1a:3c:5d:30:23:7c:1c:53:68:62:ab:0d:22:52:af:
         5f:4b:4f:58
-----BEGIN CERTIFICATE-----
MIIDVjCCAj6gAwIBAgIQWSwz5CiMvFPqrSVWUDowlzANBgkqhkiG9w0BAQsFADAV
MRMwEQYDVQQDDApIYWNrVGhlQm94MB4XDTIyMDYyMTE3NTQzMFoXDTI1MDYwNTE3
NTQzMFowFTETMBEGA1UEAwwKR29kZWZyb3kyOTCCASIwDQYJKoZIhvcNAQEBBQAD
ggEPADCCAQoCggEBAL0Qxec+1fEj9i/KcD6jYS+Eg7zhSdKuZXj3lPZc1PDaC/dE
dXdFKX/B+o3cHojUpbeJx2ZsSycfnUUcf28Ydp0IFlIvMklr0KVq2qmUbGsLX+lF
NTa7/JAzv2k4lV9Poo32+irWIMU20vIwsqyZ3OvYWOdLOXtq/zEVzJrD0LqLWeo6
mvc2kI7RxJtzaKU9MABSr2vh5ViX8x0YmgYEmzyItpUb4ExZE7Vk1aAmrG9ypAoG
j/f7xFfBVDGLOWCTlHzfE1uDLe2xhXqA/H3XmoZNzKX1W1Ko3V561ITtqKHTZpVv
1BF+Ex4NEjzCwp5JJ/Rkhpm0VDOixUdTVNGEt/kCAwEAAaOBoTCBnjAJBgNVHRME
AjAAMB0GA1UdDgQWBBRcjNqoiUQGf3fpAS2n59GtERBpMjBQBgNVHSMESTBHgBQa
g79J22UuiK7uHLpH7FwfMhd4fKEZpBcwFTETMBEGA1UEAwwKSGFja1RoZUJveIIU
QShMroYO95avGUV+HFvOEghuMv8wEwYDVR0lBAwwCgYIKwYBBQUHAwIwCwYDVR0P
BAQDAgeAMA0GCSqGSIb3DQEBCwUAA4IBAQBrzEcfZ7isz3L94Iadwl/XcFwQKpAX
BnbJtUXRh+nMmUmRW0iZH79q7nU+R7efkKYnLm65wVPM8J2aV/ieCsQW/s0iHmP5
3FRg1xU+7DSinvvtmSZuK08h2ICQZucaN1YpA4pRq2okL8mxJvp8hM9Rzq3mDC6M
tkB7unD5n06fD/0rkMuKRhinjjNbOSakBiyexP6LVA+cI9qIJqsuU0I8/GRj9sps
0PYqU0N3d8sJSFMHCPJqfcTp1M0Lq8WG4HRT81B7ONXD7wDKnQ32712RUbeHr01v
zMKO2abt5nEk8HzSyoKPS1xm0LHe5roaPF0wI3wcU2hiqw0iUq9fS09Y
-----END CERTIFICATE-----
</cert>
<key>
-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC9EMXnPtXxI/Yv
ynA+o2EvhIO84UnSrmV495T2XNTw2gv3RHV3RSl/wfqN3B6I1KW3icdmbEsnH51F
HH9vGHadCBZSLzJJa9ClatqplGxrC1/pRTU2u/yQM79pOJVfT6KN9voq1iDFNtLy
MLKsmdzr2FjnSzl7av8xFcyaw9C6i1nqOpr3NpCO0cSbc2ilPTAAUq9r4eVYl/Md
GJoGBJs8iLaVG+BMWRO1ZNWgJqxvcqQKBo/3+8RXwVQxizlgk5R83xNbgy3tsYV6
gPx915qGTcyl9VtSqN1eetSE7aih02aVb9QRfhMeDRI8wsKeSSf0ZIaZtFQzosVH
U1TRhLf5AgMBAAECggEAOUGGHWS7F57jZE+zNFT4DpLb7mxvldz4n+yicQVl+1ad
PxG9XRRV3/nXrfRWTuvPD8kq2Mq866k4UICz2uoWqbGUSOlAGloLQr0cYTSwrK4y
Koup9NxzPRxewDfBjK6qNMHxut1D6VWUBoJW6cxiyg2nxsvSKZ0akTvfzZK1eHhL
zTCzaGgypiWxz5se48GwsifPHxQJwRg1bGzup2Sz/g4Ed9PpXlXRcPESFhucrW4+
0vEXQ6eFQEGqOfhlInKIfzvkMwxsifW9/o+J2MPnjIC8r47+3Bn8FIU+agkRCHkg
Vqki1MBBTxwX3vqY+5FbycjWeC4hjVRUqPbYEjc/vQKBgQDecYF2lY20GwxzT/rW
OjpE6WJRgtmD4sTfbacUwz1mo0LfmvGPWanzfK1S/E1tecDUmBS5BvPMI5EqlbCB
+diPUa1PW6l7yHU5/5et/DobXfH3O4Z+7x40/90AVARhkGIk7Q9ELZPAc9lysLOo
uS/ovc/oQq06Z++in+AUsKncSwKBgQDZlkEz2Hlx5E6pxp2SZNADqd/Gi7i/Fwuo
HXbsj+hZnvyewP5URcz9OwTjnCbpYGFo3AmSDZDWrt5XCuq1nEOrYlF9o06nSu9K
VAci09WnSwbUNl1+bwK0DJ2PED7fUS+DrQcJ9v3JRr9oCw2k448sx3aZmxyyVFmN
4IHnJwrKSwKBgCgYY5KhcHJncb4TS45z3m7vdnZk1JpONNhlJnm6m4W1pecyQZpq
OhUWgxNzQO2bxaNMamfTlfxU6OS5KKC1DVEAEvI7/ne+cUrsBEYrMbofG+9JfnvA
1DwPZqGZg1SmttobFOZgJMLK3wYqTaf7AWS9Wg1uf1UIyQwSL0zrbyKzAoGAUsoA
9SEg1FzyMVcJDXKeU0aHhpwTJ2I1ZToQzeHTnoYHyL/WBWqpnJCgQ5pek93AMo3G
dnQC8CyJHMVimMdkWAmIyC0i+DRi5/0g2feQC59YcdZdrIXAmZFTQeQEiCPz2D41
t2zrE3J/0a6i+mI7T+Z1Ee0a9h9yE7Ggu7r3OBECgYEAnv3DNB+dJYyMlNuc/vQu
sk43E8h5QfC2+NuzC5Hgjj848MwJrgA87U7ktZl7ncSIFahFWEkQMRmIiD0B6GGV
wIKisyj+AEU8ANtRgpYO3vRBbJfUQ0fqOC+iCGex4lcmJKQHUA0zcA/siAICjyxq
qW95OD33q+ba3jg+eGKbqKw=
-----END PRIVATE KEY-----
</key>
<tls-auth>
#
# 2048 bit OpenVPN static key
#
-----BEGIN OpenVPN Static key V1-----
0c2366d5bc34cc2cfced9f8ed08b94e3
7e2be07c258c3de51eefa39e8cc4a2dc
b822000c24c3d5267dc35cc097e36c43
cb8f570d8a42fbfd41b9c3e2230bf1b1
4d0bb9af2722356ea49bd66e19fdfbc3
554fcc530d0ef5a2484f1d63a6da1a3a
d5bbbaa32f27a51e216711c4fb104f26
a0d7a3db0c1ad27a216c6e31637a2995
a59060bf9ee947b89fbfc34570f5bf3b
4af9818f8de979da6205cdcbefbce4a4
995a0b7726e67c095e0d567f6a2de413
8f07d8d32894767f709646913f9d674f
c89dee94440ec0f3bc13f0bbab5502a3
6b59db08892ae408283001a083f78c11
d5d23a051fe1e5ef1fd8dc9c387f85ff
584ffdd15ee63e6640c7782151498019
-----END OpenVPN Static key V1-----
</tls-auth>
