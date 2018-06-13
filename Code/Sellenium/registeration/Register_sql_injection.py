import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys


class Register_SQL_injection(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_sql_injection(self):
        driver = self.driver
        driver.get("http://192.168.202.227/register")
        name = driver.find_element_by_id("name")
        family_name = driver.find_element_by_id("family")
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
        name.send_keys("smjfas")
        family_name.send_keys("select * from user_table")  # family name
        email.send_keys("sm.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha
        submit.click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
