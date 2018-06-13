import unittest

from selenium import webdriver


# assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_sql_injection(self):
        driver = self.driver
        driver.get("http://192.168.202.227/contact")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        captcha = driver.find_element_by_id("captcha")
        login = driver.find_element_by_id("login")
        username.send_keys("select * from users")
        password.send_keys("123")
        captcha.send_keys("1234")
        login.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
