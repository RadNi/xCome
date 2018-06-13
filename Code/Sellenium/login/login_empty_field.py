import unittest

from selenium import webdriver


# assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_empty_username(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/login")
        password = driver.find_element_by_id("password")
        captcha = driver.find_element_by_id("captcha")
        login = driver.find_element_by_id("login")
        # Assume a user smjfas with pass 1234567 is registered in system
        password.send_keys("1234567")
        captcha.send_keys("1234")
        login.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_login_empty_password(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/login")
        username = driver.find_element_by_id("username")
        captcha = driver.find_element_by_id("captcha")
        login = driver.find_element_by_id("login")
        # Assume a user smjfas with pass 1234567 is registered in system
        username.send_keys("smjfas")
        captcha.send_keys("1234")
        login.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_login_empty_captcha(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/login")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        login = driver.find_element_by_id("login")
        # Assume a user smjfas with pass 1234567 is registered in system
        username.send_keys("smjfas")
        password.send_keys("1234567")
        login.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
