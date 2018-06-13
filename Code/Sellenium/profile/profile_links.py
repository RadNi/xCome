import unittest

from selenium import webdriver


class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_main_page(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        main_page_link = driver.find_element_by_id("mainpage")
        main_page_link.click()

        assert "http://127.0.0.1:8000/profile" == driver.current_url

    def test_profile_user_information(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_inf_page = driver.find_element_by_id("userinfo")
        user_inf_page.click()
        assert "http://127.0.0.1:8000/user/information" == driver.current_url

    def test_profile_transaction_history(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_transaction_history = driver.find_element_by_id("transactions")
        user_transaction_history.click()
        assert "http://127.0.0.1:8000/user/transactions" == driver.current_url

    def tearDown(self):
        self.driver.close()
