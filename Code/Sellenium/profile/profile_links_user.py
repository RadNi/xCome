import unittest

from selenium import webdriver
from test_utility import static_data


class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_main_page(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("mainpage").click()

        assert (static_data.base_url + "user/profile") == driver.current_url

    def test_profile_user_information(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("userinfo").click()

        assert (static_data.base_url + "user/information") == driver.current_url

    def test_profile_transaction_history(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("transactions").click()

        assert (static_data.base_url + "user/transactions") == driver.current_url

    def tearDown(self):
        self.driver.close()
