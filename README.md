# Bookz.com
Bookz.com is a vulnerable website for studying and practicing of a famous web application vulnerability called Insecure Direct Object Reference (IDOR). It is basically a developer's negligence to insecurely reference application object with open reference. Such a small negligence has caused many serious consquences.

This website has two types of users:
1. Staff
2. Students

Staff members can borrow any book. But this web application shows only books with even IDs. Meaning students can borrow can only books with even IDs.

Staff members can login with ID = 007 and Password = staff.
Students can login with with their ID = 1306 and Password = 1306
