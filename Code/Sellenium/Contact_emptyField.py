import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys


class Register_emptyField_Test(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_empty_message(self):
        driver = self.driver
        driver.get("http://172.20.10.6/contact")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        name = driver.find_element_by_id("name")
        username = driver.find_element_by_id("username")
        cellphone_number = driver.find_element_by_id("cellphone")
        message = driver.find_element_by_id("message")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty message
        name.send_keys("feyz")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        username.send_keys("smjfas")  # username
        cellphone_number.send_keys("09398604014")  # cellnum
        message.send_keys("this is a test message from Sellenium")  # address

        captcha.send_keys("7736")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_family(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj") # name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_email(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")   # name
        family_name.send_keys("feyzabadisani")  # family name
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_national_id(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_username(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_password(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_repass(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_cellnum(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        address = driver.find_element_by_id("address")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_address(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        captcha.send_keys("778536")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_captcha(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        national_id = driver.find_element_by_id("person_id")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("repass")
        cellphone_number = driver.find_element_by_id("cellphone")
        address = driver.find_element_by_id("address")
        submit = driver.find_element_by_id("submit")

        # empty name
        name.send_keys("smj")
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
