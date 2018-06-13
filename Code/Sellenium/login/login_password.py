import unittest

from selenium import webdriver


# assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_password(self):
        driver = self.driver
        driver.get("http://192.168.202.227/contact")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        captcha = driver.find_element_by_id("captcha")
        login = driver.find_element_by_id("login")
        # Assume a user smjfas with pass 123 is not registered in system
        username.send_keys("smjfas")
        password.send_keys("123")
        captcha.send_keys("1234")
        login.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
